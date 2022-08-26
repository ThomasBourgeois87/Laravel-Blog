<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;



Route::get('/', [PostController::class, 'index'])->name('homepage');


Route::get('post/{post:slug}', [PostController::class, 'show'])->name('post');

