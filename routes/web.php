<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\SkripsiController;


// Route antar Page
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('mhs.home');

    Route::get('/profile', [ProfileController::class, 'showProfile'])->name('mhs.profile');

    Route::get('/pembayaran', [HomeController::class, 'showPembayaran'])->name('mhs.pembayaran');

    Route::get('/studi', [HomeController::class, 'showStudi'])->name('mhs.studi');

    Route::get('/statistik', [HomeController::class, 'showStatistik'])->name('mhs.statistik');

    Route::get('/transkrip', [HomeController::class, 'showTranskrip'])->name('mhs.transkrip');

    Route::get('/skripsi', [HomeController::class, 'showSkripsi'])->name('mhs.skripsi');

    Route::get('/profileEdit', [HomeController::class, 'showProfileEdit'])->name('mhs.profileEdit');

    Route::post('/upload-photo', [ProfileController::class, 'uploadPhoto'])->name('route_upload_photo');

    Route::post('/skripsi/store', [SkripsiController::class, 'store'])->name('skripsi.store');
});

Route::middleware([AdminMiddleware::class])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('adm.home');
    Route::get('/admin/skripsi/{id}/edit', [AdminController::class, 'edit'])->name('adm.skripsi.edit');
    Route::put('/admin/skripsi/{id}', [AdminController::class, 'update'])->name('adm.skripsi.update');

    Route::get('/admin/profile', [MahasiswaController::class, 'showStudentData'])->name('adm.profile');

    Route::get('/admin/mahasiswa/{id}/edit', [MahasiswaController::class, 'edit'])->name('mahasiswa.edit');
    Route::delete('/admin/mahasiswa/{id}', [MahasiswaController::class, 'destroy'])->name('mahasiswa.destroy');

    Route::get('/admin/jadwal', [AdminController::class, 'ShowJadwal'])->name('adm.jadwal');
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

Route::get('/forgotPassword', [AuthController::class, 'showForgotPassword'])->name('forgotPasswordPage');
