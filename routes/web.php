<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function(){
    Route::get('/Dashboard',[DashboardController::class, 'index']);
    Route::get('/profile/{user}',[UserController::class, 'profile']);
    Route::post('/post',[PostController::class,'create']);
    Route::post('/post/{post}/{userid}/edit',[PostController::class,'edit'])->name('posts.edit');
    Route::post('/post/{post}/like',[LikeController::class,'like'])->name('posts.like');
    Route::post('/post/{post}/dislike',[LikeController::class,'dislike'])->name('posts.dislike');
    Route::post('/logout',[LogoutController::class,'index']);
    Route::post('/username',[UserController::class,'username']);
    Route::post('/email',[UserController::class,'email']);
    Route::post('/password',[UserController::class,'password']);
    Route::post('/avatar',[UserController::class,'avatar']);
    Route::post('/post/{post}/delete',[PostController::class,'delete'])->name('posts.delete');
    Route::post('/post/{post}/retweet',[PostController::class,'retweet'])->name('posts.retweet');
});
Route::get('/',[MainController::class, 'index']);
Route::view('/login','login');
Route::view('/register','register');
Route::post('/register',[RegisterController::class,'create']);
Route::post('/login',[LoginController::class,'index']);
