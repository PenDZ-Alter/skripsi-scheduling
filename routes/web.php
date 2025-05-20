<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;


// Route antar Page
Route::middleware(['auth'])->group(function() {
    Route::get('/home', [HomeController::class, 'index'])->name('mhs.home');
    
    Route::get('/profile', [ProfileController::class, 'showProfile'])->name('mhs.profile');

    Route::get('/pembayaran', function () {
        return view('dashboard.mahasiswa.pembayaran');
    })->name('mhs.pembayaran');

    Route::get('/studi', function () {
        return view('dashboard.mahasiswa.studi');
    })->name('mhs.studi');

    Route::get('/statistik', function () {
        return view('dashboard.mahasiswa.statistik');
    })->name('mhs.statistik');

    Route::get('/transkrip', function () {
        return view('dashboard.mahasiswa.transkrip');
    })->name('mhs.transkrip');

    Route::get('/skripsi', function () {
        return view('dashboard.mahasiswa.skripsi');
    })->name('mhs.skripsi');
    
    Route::get('/profileEdit', function () {
        return view('dashboard.mahasiswa.profileEdit');
    })->name('mhs.profileEdit');
    
    Route::post('/upload-photo', [ProfileController::class, 'uploadPhoto'])->name('route_upload_photo');
});

Route::get('/admin', function () {
    return view('dashboard.admin.home');
})->name('adm.home');

Route::get('/adminprofil', function () {
    return view('dashboard.admin.profile');
})->name('adm.profile');

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

Route::get('/forgotPassword', [AuthController::class, 'showForgotPassword'])->name('forgotPasswordPage');
