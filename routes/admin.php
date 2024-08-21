<?php

use App\Http\Controllers\admins\articleController;
use App\Http\Controllers\admins\CategoryController;
use App\Http\Controllers\admins\HomeController;
use App\Http\Controllers\admins\UserController;
use App\Http\Controllers\admins\CommentController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'checkAdmin'])->prefix('admin')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('admin');

    // Quản lí người dùng
    Route::prefix('user')->group(function () {
        Route::get('/', [UserController::class, 'show'])->name('admin.user');
        Route::get('/add', [UserController::class, 'create'])->name('admin.user.add');
        Route::post('/add', [UserController::class, 'store']);
        Route::get('/update/{userID}', [UserController::class, 'edit'])->name('admin.user.edit');
        Route::put('/update/{userID}', [UserController::class, 'update']);
        Route::delete('/delete/{userID}', [UserController::class, 'delete'])->name('admin.user.delete');
    });


    // Quản lí Category
    Route::prefix('category')->group(function () {
        Route::get('/', [CategoryController::class, 'show'])->name('admin.category');
        Route::get('/add', [CategoryController::class, 'create'])->name('admin.category.add');
        Route::post('/add', [CategoryController::class, 'store']);
        Route::get('/update/{categoryID}', [CategoryController::class, 'edit'])->name('admin.category.edit');
        Route::put('/update/{categoryID}', [CategoryController::class, 'update']);
        Route::delete('/delete/{categoryID}', [CategoryController::class, 'delete'])->name('admin.category.delete');
    });



    // Quản lí article
    Route::get('/article', [articleController::class, 'show'])->name('admin.article');
    Route::patch('/article/update/{articleID}', [articleController::class, 'updateStatus'])->name('admin.article.updateStatus');
    Route::get('/article/draft', [articleController::class, 'showDraft'])->name('admin.article.draft');
    Route::get('/article/add', [articleController::class, 'create'])->name('admin.article.add');
    Route::post('/article/add', [articleController::class, 'store']);   
    Route::get('/article/update/{id}', [articleController::class, 'edit'])->name('admin.article.edit');
    Route::put('/article/update/{id}', [articleController::class, 'update']);
    Route::delete('/article/delete/{id}', [articleController::class, 'delete'])->name('admin.article.delete');

    // Quản lí comment
    Route::get('/comment', [CommentController::class, 'show'])->name('admin.comment');
    Route::get('/comment/{articleID}', [CommentController::class, 'showArticle'])->name('admin.comment.article');
    Route::post('/comment/delete/{id}', [CommentController::class, 'delete'])->name('admin.comment.delete');
});
