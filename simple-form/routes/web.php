<?php

use App\Http\Controllers\PostController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $posts = Post::all();
    return view('home', compact('posts'));
})->name('home');
Route::group([ 'prefix' => '/post', 'as' => 'post.'], function() {
    Route::post('', [PostController::class, 'store'] )->name('create');
    Route::delete('/{id}', [PostController::class, 'destroy'] )->name('destroy');
});
