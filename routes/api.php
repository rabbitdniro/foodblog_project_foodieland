<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckTokenExpires;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;


//Backend Controllers Route
//User API Routes
Route::post('/login', [UserController::class, 'userLogin'])->name('login.show');
Route::post('/register', [UserController::class, 'userRegister'])->name('register.show');
Route::post('/send-otp', [UserController::class, 'sendOTP'])->name('send.otp');
Route::post('/verify-otp', [UserController::class, 'verifyOTP'])->name('verify.otp');

//................................................................................

//group routes that require authentication
Route::middleware('auth:sanctum', CheckTokenExpires::class)->group(function (){
    //User API Routes
    Route::post('/logout', [UserController::class, 'userLogout'])->name('user.logout');
    Route::post('/reset-password', [UserController::class, 'forgetPassword'])->name('password.reset');
    Route::get('/user-profile', [UserController::class, 'userProfile'])->name('user.profile');
    Route::post('/user-profile-update', [UserController::class, 'userProfileUpdate'])->name('user.profile.update');

    // Category API Routes
    Route::get('/category', [CategoryController::class, 'categoryList'])->name('category.List');
    Route::post('/categoryStore', [CategoryController::class, 'categoryStore'])->name('category.store');
    Route::post('/categoryShow/{id}', [CategoryController::class, 'categoryShow'])->name('category.show');
    Route::post('/category/update/{id}', [CategoryController::class, 'categoryUpdate'])->name('category.update');
    Route::post('/category/delete/{id}', [CategoryController::class, 'categoryDestroy'])->name('category.delete');

    // Blog API Routes
    Route::get('/blog', [CategoryController::class, ''])->name('blog.List');
    Route::post('/blogStore', [CategoryController::class, ''])->name('blog.store');
    Route::post('/blogShow/{id}', [CategoryController::class, ''])->name('blog.show');
    Route::post('/blog-update/{id}', [CategoryController::class, ''])->name('blog.update');
    Route::post('/blog-delete/{id}', [CategoryController::class, ''])->name('blog.delete');

    //Dashboard Summary
    Route::get('/dashboard-summary', [DashboardController::class, '']);

    //profile api routes
});