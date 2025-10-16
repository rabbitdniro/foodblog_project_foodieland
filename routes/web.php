<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
});


// Other route definitions...
// For example:
// Route::get('/posts', [PostController::class, 'index'])->name('posts