<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BotManController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::match(['get', 'post'], '/botman', [BotManController::class, 'handle']);

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'admindashboard'])->name('admin.dashboard');
    Route::get('/admin/inquiries/{inquiry}', [AdminController::class, 'show'])->name('inquiries.show');
    Route::post('/admin/reply/{inquiry}', [AdminController::class, 'reply'])->name('inquiries.reply');
    Route::get('/admin/{inquiry}/reply', [AdminController::class, 'replyForm'])->name('inquiries.replyForm');

    Route::get('/admin/solutions', [AdminController::class, 'adminsolutions'])->name('admin.solutions');
    Route::get('/admin/articles', [AdminController::class, 'adminarticles'])->name('admin.articles');
    Route::get('/admin/gallery', [AdminController::class, 'admingallery'])->name('admin.gallery');
    Route::get('/admin/industries', [AdminController::class, 'admindustries'])->name('admin.industries');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/upload/photo', [AdminController::class, 'uploadview'])->name('uploadphoto');
    Route::post('/admin/photo/upload', [AdminController::class, 'upload'])->name('photo.upload');
    Route::get('/admin/photos/{photo}/edit', [AdminController::class, 'editPhoto'])->name('edit.photo'); 
    Route::delete('/admin/photos/{photo}', [AdminController::class, 'deletePhoto'])->name('delete.photo'); 
    Route::put('/admin/photos/{photo}', [AdminController::class, 'updatePhoto'])->name('update.photo');

    Route::get('/admin/industries/create', [AdminController::class, 'create'])->name('industries.create');
    Route::post('/admin/industries', [AdminController::class, 'store'])->name('industries.store');
    Route::get('/admin/industries/{id}/edit', [AdminController::class, 'editIndustry'])->name('industries.edit');
    Route::put('/admin/industries/{id}', [AdminController::class, 'updateIndustry'])->name('industries.update');
    Route::delete('/admin/industries/{id}', [AdminController::class, 'deleteIndustry'])->name('industries.delete');

    Route::get('/admin/solutions/create', [AdminController::class, 'createSolution'])->name('solutions.create');
    Route::post('/admin/solutions', [AdminController::class, 'storeSolution'])->name('solutions.store');
    Route::get('/admin/solutions/{solution}/edit', [AdminController::class, 'editSolution'])->name('solutions.edit');
    Route::put('/admin/solutions/{solution}', [AdminController::class, 'updateSolution'])->name('solutions.update');
    Route::delete('/admin/solutions/{solution}', [AdminController::class, 'deleteSolution'])->name('solutions.delete');
    Route::get('/admin/solutions/{solution}', [AdminController::class, 'showSolution'])->name('solutions.show');

    Route::get('/admin/articles/create', [AdminController::class, 'createArticle'])->name('articles.create');
    Route::post('/admin/articles', [AdminController::class, 'storeArticle'])->name('articles.store');
    Route::get('/admin/articles/{article}', [AdminController::class, 'showArticle'])->name('articles.show');
    Route::get('/admin/articles/{article}/edit', [AdminController::class, 'editArticle'])->name('articles.edit');
    Route::put('/admin/articles/{article}', [AdminController::class, 'updateArticle'])->name('articles.update');
    Route::delete('/admin/articles/{article}', [AdminController::class, 'deleteArticle'])->name('articles.delete');
});

Route::get('/aboutus', [PageController::class, 'about'])->name('aboutus');
Route::get('/solutions', [PageController::class, 'solutions'])->name('solutions');
Route::get('/solutions/{solution}', [PageController::class, 'displaySolutions'])->name('solutions.details');
Route::get('/articles', [PageController::class, 'articles'])->name('articles');
Route::get('/articles/{article}', [PageController::class, 'displayArticles'])->name('articles.details');
Route::get('/gallery', [PageController::class, 'gallery'])->name('gallery');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact.submit', [PageController::class, 'stroeInquiry'])->name('contact.submit');

Route::get('/reviews/create', [PageController::class, 'create'])->name('reviews.create');
Route::post('/reviews', [PageController::class, 'store'])->name('reviews.store');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
