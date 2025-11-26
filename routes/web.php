<?php

use App\Http\Controllers\HemisAuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArticleController;
use App\Models\Article;
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    $articles = Article::orderBy('created_at', 'desc')->paginate(2);
    return view('welcome', compact('articles'));
})->name('home');
Route::post('/logout', [ProfileController::class, 'logout'])->name('logout');
Route::get('dashboard',[ProfileController::class, 'show'] )->name('dashboard')->middleware(['auth', 'verified']);
Route::get('/hemis/redirect', [HemisAuthController::class, 'redirectToHemis'])->name('hemis.redirect');
Route::get('/hemis/callback', [HemisAuthController::class, 'login'])->name('hemis.callback');
Route::middleware('auth')->group(function () {
    Route::post('articles', [ArticleController::class, 'store'])->name('articles.store');
    Route::put('articles/{article}', [ArticleController::class, 'update'])->name('articles.update');
    Route::post('articles/patent', [ArticleController::class, 'uploadPatent'])->name('articles.uploadPatent');
    Route::get('patent-status/{article}', [ArticleController::class, 'getPatentStatus'])->name('articles.patentStatus');
});
