<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


//login route for user
Route::post('/login', [UserController::class, 'UserLogin']);
Route::post('/register', [UserController::class, 'register']);

//group routes that require authentication
Route::middleware('auth:sanctum')->group(function (){
    //User logout
    Route::post('/logout', [UserController::class, 'logout']);
});