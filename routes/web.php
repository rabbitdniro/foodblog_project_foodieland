<?php

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('pages.home');
});

Route::get('/blog', function () {
    return view('pages.blogs');
});

Route::get('/contact', function () {
    return view('pages.contact');
});


//login route for user
Route::post('/login', [UserController::class, 'userLogin'])->name('login.show');
Route::post('/register', [UserController::class, 'userRegister'])->name('register.show');

// Registration
Route::get('/register', function () {
    return view('pages.register');
})->name('register.show');

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

// Login (mobile only)
Route::get('/login', function () {
    return view('pages.login');
})->name('login.show');

Route::post('/login', function (Request $request) {
    $request->validate([
        'login' => ['required','string','min:3'],
        'password' => ['required','string','min:6'],
    ]);

    // In a real app: authenticate (username/mobile + password) and then send OTP as second factor
    return redirect()->route('otp.show');
})->name('login.submit');

// OTP verification (6 digits)
Route::get('/otp', function () {
    return view('pages.otp');
})->name('otp.show');

Route::post('/otp', function (Request $request) {
    $request->validate([
        'otp' => ['required','regex:/^[0-9]{6}$/']
    ]);

    // In a real app: verify OTP here
    return redirect('/');
})->name('otp.verify');

// Password reset - request form
Route::get('/password/forgot', function () {
    return view('pages.password.forgot');
})->name('password.forgot.show');

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

