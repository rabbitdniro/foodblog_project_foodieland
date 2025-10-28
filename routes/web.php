<?php

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

// Frontend View Routes
Route::get('/register', [UserController::class, 'registerPage'])->name('register.show');
Route::get('/login', [UserController::class, 'loginPage'])->name('login.show');
Route::get('/sand-otp', [UserController::class, 'sandOTPPage'])->name('otp.show');
Route::get('/password-forgot', [UserController::class, 'resetPasswordPage'])->name('password.forgot.show');

//................................................................................

Route::get('/', [HomeController::class, 'homePage'])->name('home.page');
Route::get('/blog', [HomeController::class, 'blogPage'])->name('blog.page');
Route::get('/contact', [HomeController::class, 'contactPage'])->name('contact.page');

//................................................................................

//Backend Controllers Route
//User API Routes
Route::post('/login', [UserController::class, 'userLogin'])->name('login');
Route::post('/register', [UserController::class, 'userRegister'])->name('register');


Route::post('/register', function (Request $request) {
    $request->validate([
        'name' => ['required','string','max:255'],
        'email' => ['required','string','email','max:255'],
        'mobile' => ['required','regex:/^\+?[0-9]{8,15}$/'],
        'password' => ['required','string','min:6','confirmed'],
    ]);

    // In a real app: create user, send OTP or login then send OTP
    return redirect()->route('otp.show');
})->name('register.submit');


Route::post('/login', function (Request $request) {
    $request->validate([
        'login' => ['required','string','min:3'],
        'password' => ['required','string','min:6'],
    ]);

    // In a real app: authenticate (username/mobile + password) and then send OTP as second factor
    return redirect()->route('otp.show');
})->name('login.submit');


Route::post('/otp', function (Request $request) {
    $request->validate([
        'otp' => ['required','regex:/^[0-9]{6}$/']
    ]);

    // In a real app: verify OTP here
    return redirect('/');
})->name('otp.verify');


Route::post('/password/forgot', function (Request $request) {
    $request->validate([
        'identifier' => ['required','string'] // email or mobile
    ]);
    // In a real app: generate token and send link/OTP
    // For demo, redirect to reset with a fake token
    $token = Str::random(32);
    return redirect()->route('password.reset.show', ['token' => $token]);
})->name('password.forgot.submit');

// Password reset - set new password
Route::get('/password/reset/{token}', function ($token) {
    return view('pages.password.reset', compact('token'));
})->name('password.reset.show');

Route::post('/password/reset/{token}', function (Request $request, $token) {
    $request->validate([
        'password' => ['required','string','min:6','confirmed']
    ]);
    // In a real app: validate token and update password
    return redirect()->route('login.show');
})->name('password.reset.submit');

