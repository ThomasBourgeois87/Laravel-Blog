<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use Illuminate\Support\Facades\Route;



Route::get('/', [PostController::class, 'index'])->name('homepage');


Route::post('/newsletter', NewsletterController::class);


Route::get('post/{post:slug}', [PostController::class, 'show'])->name('post');
Route::post('post/{post:slug}/comments', [PostCommentsController::class, 'store']);


Route::get('/register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');


Route::get('/login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('/login', [SessionsController::class, 'store'])->middleware('guest');

Route::post('/logout', [SessionsController::class, 'destroy'])->middleware('auth');

// Admin
Route::middleware('can:admin')->group(function () {
    Route::get('/admin/posts', [AdminPostController::class, 'index']);
    Route::get('/admin/posts/create', [AdminPostController::class, 'create']);
    Route::post('/admin/post', [AdminPostController::class, 'store']);
    Route::get('/admin/posts/{post:id}/edit', [AdminPostController::class, 'edit']);
    Route::patch('/admin/posts/{post:id}', [AdminPostController::class, 'update']);
    Route::delete('/admin/posts/{post:id}', [AdminPostController::class, 'destroy']);
});

