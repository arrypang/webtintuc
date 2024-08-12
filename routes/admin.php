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
    Route::get('/user', [UserController::class, 'show'])->name('admin.user');
    Route::get('/user/add', [UserController::class ,'create'])->name('admin.user.add');
    Route::put('/user/add', [UserController::class, 'store']);
    Route::get('/user/update/{userID}', [UserController::class ,'edit'])->name('admin.user.edit');
    Route::put('/user/update/{userID}', [UserController::class, 'update']);
    Route::delete('/user/delete/{userID}', [UserController::class, 'delete'])->name('admin.user.delete');

    // Quản lí Category
    Route::get('/category', [CategoryController::class, 'show'])->name('admin.category');
    Route::get('/category/add', [CategoryController::class ,'create'])->name('admin.category.add');
    Route::post('/category/add', [CategoryController::class, 'store']);
    Route::get('/category/update/{categoryID}', [CategoryController::class ,'edit'])->name('admin.category.edit');
    Route::put('/category/update/{categoryID}', [CategoryController::class, 'update']);
    Route::delete('/category/delete/{categoryID}', [CategoryController::class, 'delete'])->name('admin.category.delete');


    // Quản lí article
    Route::get('/article', [articleController::class, 'show'])->name('admin.article');

    Route::get('/article/add', [articleController::class ,'create'])->name('admin.article.add');
    Route::post('/article/add', [articleController::class, 'store']);

    Route::get('/article/update/{id}', [articleController::class ,'edit'])->name('admin.article.edit');
    Route::post('/article/update/{id}', [articleController::class, 'update']);

    Route::delete('/article/delete/{id}', [articleController::class, 'delete'])->name('admin.article.delete');

    // Quản lí Category
    Route::get('/comment', [CommentController::class, 'show'])->name('admin.comment');

    Route::get('/comment/{articleID}', [CommentController::class ,'showArticle'])->name('admin.comment.article');

    Route::post('/comment/delete/{id}', [CommentController::class, 'delete'])->name('admin.comment.delete');


});