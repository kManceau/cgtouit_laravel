<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::controller(PostController::class)->group(function () {
   Route::get('/', 'index')->name('home');
   Route::post('/', 'index')->name('post.store');
});
Route::resource('/post', PostController::class)
    ->only(['destroy', 'edit', 'update', 'show']);

Route::resource('/comment', CommentController::class)
    ->only(['store', 'destroy', 'edit', 'update']);

Route::resource('users', UserController::class)->except('index', 'create', 'store');
