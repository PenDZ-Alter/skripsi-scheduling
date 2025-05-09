<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;


// Route antar Page
Route::middleware(['auth'])->group(function() {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    
    Route::get('/profile', [ProfileController::class, 'showProfile'])->name('profile');

    Route::get('/pembayaran', function () {
        return view('dashboard.mahasiswa.pembayaran');
    })->name('pembayaran');

    Route::get('/studi', function () {
        return view('dashboard.mahasiswa.studi');
    })->name('studi');

    Route::get('/statistik', function () {
        return view('dashboard.mahasiswa.statistik');
    })->name('statistik');

    Route::get('/transkrip', function () {
        return view('dashboard.mahasiswa.transkrip');
    })->name('transkrip');

    Route::get('/skripsi', function () {
        return view('dashboard.mahasiswa.skripsi');
    })->name('skripsi');
    
    Route::get('/profileEdit', function () {
        return view('dashboard.mahasiswa.profileEdit');
    })->name('profileEdit');
    
    Route::post('/upload-photo', [ProfileController::class, 'uploadPhoto'])->name('route_upload_photo');
});

Route::get('/', function () {
    return view('auth.login');
});

// Route Login dan Register
Route::get('/register', [AuthController::class, 'showRegisterPage'])->name('registerpage');
Route::post('/register', [AuthController::class, 'storeInitialRegisterData'])->name('register.storeInitial');
Route::get('/register/data', [AuthController::class, 'showRegisterDataPage'])->name('registerDataPage');
Route::post('/register/submit', [AuthController::class, 'handleRegister'])->name('register.submit');

Route::get('/login', [AuthController::class, 'showLoginPage'])->name('login');
Route::post('/login/submit', [AuthController::class, 'handleLogin'])->name('login.submit');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route Fungsi Upload Foto

