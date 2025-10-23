<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


//login route for user
Route::post('/login', [UserController::class, 'userLogin']);
Route::post('/register', [UserController::class, 'userRegister']);

//Category routes listing
Route::get('/category', [CategoryController::class, 'categoryList'])->name('category.List');



//group routes that require authentication
Route::middleware('auth:sanctum')->group(function (){
    //User logout
    Route::post('/logout', [UserController::class, 'userLogout'])->name('user.logout');

    //Category create/store
    Route::post('/categoryStore', [CategoryController::class, 'categoryStore'])->name('category.store');
    Route::post('/categoryShow/{id}', [CategoryController::class, 'categoryShow'])->name('category.show');
    Route::post('/category/update/{id}', [CategoryController::class, 'categoryUpdate'])->name('category.update');
    Route::post('/category/delete/{id}', [CategoryController::class, 'categoryDestroy'])->name('category.delete');
});