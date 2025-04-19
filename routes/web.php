<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;


// Route antar Page
Route::get('/', function () {
    return view('auth.login');
});

Route::get('/home', function() {
    return view('dashboard.home');
})->name('home');

Route::get('/profile', function () {
    return view('dashboard.profile');
})->name('profile');

Route::get('/profileEdit', function () {
    return view('dashboard.profileEdit');
})->name('profileEdit');

Route::get('/login', function () {
    return view('auth.login');
})->name('loginpage');

Route::get('/register', function () {
    return view('auth.register');
})->name('registerpage');

Route::get('/registerData', function () {
    return view('auth.registerData');
})->name('registerDataPage');


// Route Login dan Register
Route::get('/register', [AuthController::class, 'showRegisterPage'])->name('registerpage');
Route::get('/register/data', [AuthController::class, 'showRegisterDataPage'])->name('registerDataPage');
Route::post('/register/data', [AuthController::class, 'handleRegister'])->name('handleRegister');

Route::get('/login', [AuthController::class, 'showLoginPage'])->name('loginpage');
Route::post('/login', [AuthController::class, 'handleLogin'])->name('handleLogin');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route Fungsi Upload Foto
Route::post('/upload-photo', [ProfileController::class, 'uploadPhoto'])->name('route_upload_photo');

