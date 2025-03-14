<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Photo;
use App\Models\Industry;
use App\Models\Solution;
use App\Models\Article;
use App\Models\Inquiry;

class PageController extends Controller
{
    public function about()
    {
        return view('pages.about');
    }

    public function solutions()
    {
        $solutions = Solution::all();
        return view('pages.solutions', compact('solutions'));
    }

    public function displaySolutions(Solution $solution)
    {
        return view('pages.solutiondetail', compact('solution'));
    }

    public function articles()
    {
        $articles = Article::all();
        return view('pages.articles', compact('articles'));
    }

    public function displayArticles(Article $article)
    {
        return view('pages.articledetail', compact('article'));
    }

    public function gallery()
    {
        $photos = Photo::all();
        return view('pages.gallery', compact('photos'));
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function create()
    {
        return view('review');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:reviews,email',
            'company' => 'nullable|string|max:255',
            'rating' => ['required', 'integer', 'min:1', 'max:5'],
            'feedback' => 'required|string',
        ]);        

        Review::create($request->all());

        return redirect()->route('reviews.create')->with('success', 'Review added successfully!');
    }

    public function stroeInquiry(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:inquiries,email',
            'phone' => 'required|string|max:15',
            'company_name' => 'nullable|string|max:255',
            'country' => 'required|string|max:255',
            'job_title' => 'nullable|string|max:255',
            'job_details' => 'nullable|string',
        ]);

        Inquiry::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'company_name' => $request->company_name,
            'country' => $request->country,
            'job_title' => $request->job_title,
            'job_details' => $request->job_details,
        ]);

        return redirect()->route('contact')->with('success', 'Inquiry submitted successfully!');
    }

}
