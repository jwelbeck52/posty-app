<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikeController;

//home route
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');

//register routes
Route::get('/register', [RegisterController::class,'index'])->name('register');
Route::post('/register', [RegisterController::class,'store'])->name('register.store');

//login routes
Route::get('/login', [LoginController::class,'index'])->name('login');
Route::post('/login', [LoginController::class,'store'])->name('login.store');

//logout route
Route::post('/logout', [LogoutController::class,'logout'])->name('logout');

//posts routes
Route::get('/posts', [PostController::class,'index'])->name('posts');
Route::post('/posts', [PostController::class,'store'])->name('posts.store');
Route::delete('/posts/{post}', [PostController::class,'destroy'])->name('posts.delete');

//postlike routes
Route::post('/posts/{post}/likes', [PostLikeController::class,'store'])->name('like.add');
Route::delete('/posts/{post}/likes', [PostLikeController::class,'destroy'])->name('like.remove');