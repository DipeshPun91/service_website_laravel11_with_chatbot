<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;
use App\Models\Industry;
use App\Models\Solution;
use App\Models\Article;
use App\Models\Inquiry;
use Mail;
use App\Mail\ReplyMail;

class AdminController extends Controller
{
    public function admindashboard()
    {
        $inquiries = Inquiry::all();
        return view('admin.dashboard', compact('inquiries'));
    }

    public function show(Inquiry $inquiry)
    {
        $otherInquiries = Inquiry::where('id', '!=', $inquiry->id)->get();
        return view('admin.inquiry', compact('inquiry', 'otherInquiries'));
    }

    public function replyForm(Inquiry $inquiry)
    {
        return view('admin.reply', compact('inquiry'));
    }

    public function reply(Request $request, Inquiry $inquiry)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $mailData = [
            'title' => $request->input('subject'),
            'body' => $request->input('message'),
        ];

        Mail::to($inquiry->email)->send(new ReplyMail($mailData));

        return redirect()->route('inquiries.show', $inquiry->id)
            ->with('success', 'Email sent successfully to ' . $inquiry->email);
    }

    //Article BackEnd
    public function adminarticles()
    {
        $articles = Article::all();
        return view('admin.article.articles', compact('articles'));
    }

    public function createArticle()
    {
        return view('admin.article.addarticle');
    }

    public function storeArticle(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image_path' => 'nullable|image|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image_path')) {
            $image = $request->file('image_path');
            $imagePath = 'images/' . $image->getClientOriginalName();
            $image->move(public_path('images'), $image->getClientOriginalName());
        }

        Article::create([
            'title' => $request->title,
            'description' => $request->description,
            'image_path' => $imagePath,
        ]);

        return redirect()->route('admin.articles')->with('success', 'Article added successfully!');
    }

    public function showArticle(Article $article)
    {
        $otherArticles = Article::where('id', '!=', $article->id)->get();

        return view('admin.article.detail', compact('article', 'otherArticles'));
    }

    public function editArticle(Article $article)
    {
        return view('admin.article.editarticle', compact('article'));
    }

    public function updateArticle(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image_path' => 'nullable|image|max:2048',
        ]);
    
        if ($request->hasFile('image_path')) {
            $image = $request->file('image_path');
            $imagePath = 'images/' . $image->getClientOriginalName();
            $image->move(public_path('images'), $image->getClientOriginalName());
    
            $article->update([
                'title' => $request->title,
                'description' => $request->description,
                'image_path' => $imagePath,
            ]);
        } else {
            $article->update($request->only(['title', 'description']));
        }
    
        return redirect()->route('admin.articles')->with('success', 'Article updated successfully!');
    }
    

    public function deleteArticle(Article $article)
    {
        $article->delete();
        return redirect()->route('admin.articles')->with('success', 'Article deleted successfully!');
    }
    
    //Gallery BackEnd
    public function admingallery()
    {
        $photos = Photo::all();

        return view('admin.gallery.gallery', compact('photos'));
    }

    public function uploadview()
    {
        return view('admin.gallery.addphoto');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $photoPath = $request->file('photo')->move(public_path('images'), $request->file('photo')->getClientOriginalName());

        Photo::create([
            'title' => $request->title,
            'description' => $request->description,
            'path' => 'images/' . $request->file('photo')->getClientOriginalName(),
        ]);

        return redirect()->route('admin.gallery')->with('success', 'Photo uploaded successfully!');
    }

    public function editPhoto($id)
    {
        $photo = Photo::findOrFail($id);

        return view('admin.gallery.editphoto', compact('photo'));
    }

    public function updatePhoto(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $photo = Photo::findOrFail($id);

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->move(public_path('images'), $request->file('photo')->getClientOriginalName());
            $photo->path = 'images/' . $request->file('photo')->getClientOriginalName();
        }

        $photo->title = $request->title;
        $photo->description = $request->description;
        $photo->save();

        return redirect()->route('admin.gallery')->with('success', 'Photo updated successfully!');
    }

    public function deletePhoto($id)
    {
        $photo = Photo::findOrFail($id);

        $photo->delete();

        return redirect()->route('admin.gallery')->with('success', 'Photo deleted successfully!');
    }

    //Industry BackEnd
    public function admindustries()
    {
        $industries = Industry::all();
        return view('admin.industry.industries', compact('industries'));
    }

    public function create()
    {
        return view('admin.industry.addindustry');
    }

    public function store(Request $request)
    {
        $request->validate([
            'industry' => 'required|string|max:255',
        ]);

        Industry::create([
            'industry' => $request->industry,
        ]);

        return redirect()->route('admin.industries')->with('success', 'Industry added successfully.');
    }

    public function editIndustry($id)
    {
        $industry = Industry::findOrFail($id);
        return view('admin.industry.editindustry', compact('industry'));
    }

    public function updateIndustry(Request $request, $id)
    {
        $request->validate([
            'industry' => 'required|string|max:255',
        ]);

        $industry = Industry::findOrFail($id);
        $industry->update([
            'industry' => $request->industry,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.industries')->with('success', 'Industry updated successfully.');
    }

    public function deleteIndustry($id)
    {
        $industry = Industry::findOrFail($id);
        $industry->delete();

        return redirect()->route('admin.industries')->with('success', 'Industry deleted successfully.');
    }

    //Software Solutions BackEnd
    public function adminsolutions()
    {
        $solutions = Solution::all();
        return view('admin.solution.solutions', compact('solutions'));
    }

    public function createsolution()
    {
        $industries = Industry::all();
        return view('admin.solution.addsolution', compact('industries'));
    }

    public function showSolution(Solution $solution)
    {
        $otherSolutions = Solution::where('industry_id', $solution->industry_id)->get();
        return view('admin.solution.details', compact('solution', 'otherSolutions'));
    }

    public function storeSolution(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'industry_id' => 'required|exists:industries,id', 
        ]);

        Solution::create([
            'title' => $request->title,
            'description' => $request->description,
            'industry_id' => $request->industry_id, 
        ]);

        return redirect()->route('admin.solutions')->with('success', 'Solution added successfully.');
    }

    public function editSolution(Solution $solution)
    {
        $industries = Industry::all();
        return view('admin.solution.editsolution', compact('solution', 'industries'));
    }

    public function updateSolution(Request $request, Solution $solution)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'industry_id' => 'required|exists:industries,id',
        ]);

        $solution->update([
            'title' => $request->title,
            'description' => $request->description,
            'industry_id' => $request->industry_id,
        ]);

        return redirect()->route('admin.solutions', $solution->id)->with('success', 'Solution updated successfully.');
    }

    public function deleteSolution(Solution $solution)
    {
        $solution->delete();

        return redirect()->route('admin.solutions')->with('success', 'Solution deleted successfully.');
    }

}
