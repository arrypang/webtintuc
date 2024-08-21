<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SlugController;
use Illuminate\Support\Facades\Route;


require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
Route::get('/', [IndexController::class,'index'])->name('home');
Route::post('/comment',[ArticleController::class,'comment'])->name('comment');
Route::get('/search',[IndexController::class,'search'])->name('search');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

Route::get('/{slug}',[SlugController::class,'checkSlug'])->name('slug');


