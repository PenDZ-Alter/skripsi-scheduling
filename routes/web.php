<?php

use Illuminate\Support\Facades\Route;

use App\Http\Middleware\AdminMiddleware;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\SkripsiController;
use App\Models\Skripsi;

// Route antar Page
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [MahasiswaController::class, 'index'])->name('mhs.home');

    Route::get('/profile', [MahasiswaController::class, 'showProfile'])->name('mhs.profile');

    Route::get('/pembayaran', [MahasiswaController::class, 'showPembayaran'])->name('mhs.pembayaran');

    Route::get('/studi', [MahasiswaController::class, 'showStudi'])->name('mhs.studi');

    Route::get('/statistik', [MahasiswaController::class, 'showStatistik'])->name('mhs.statistik');

    Route::get('/transkrip', [MahasiswaController::class, 'showTranskrip'])->name('mhs.transkrip');

    Route::get('/skripsi', [MahasiswaController::class, 'showSkripsi'])->name('mhs.skripsi');

    Route::get('/profileEdit', [MahasiswaController::class, 'showProfileEdit'])->name('mhs.profileEdit');

    Route::post('/upload-photo', [MahasiswaController::class, 'uploadPhoto'])->name('route_upload_photo');

    Route::post('/skripsi/store', [SkripsiController::class, 'store'])->name('skripsi.store');
});

Route::middleware([AdminMiddleware::class])->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('adm.home');

    // Skripsi Routes
    Route::get('/skripsi/{id}/edit', [SkripsiController::class, 'edit'])->name('skripsi.edit');
    Route::post('/skripsi/{id}', [SkripsiController::class, 'update'])->name('skripsi.update');
    Route::delete('/skripsi/{id}', [SkripsiController::class, 'destroy'])->name('skripsi.destroy');

    // Mahasiswa Routes
    Route::get('/profile', [MahasiswaController::class, 'showStudentData'])->name('adm.profile');
    Route::get('/mahasiswa/{id}/edit', [MahasiswaController::class, 'edit'])->name('mahasiswa.edit');
    Route::delete('/mahasiswa/{id}', [MahasiswaController::class, 'destroy'])->name('mahasiswa.destroy');

    // Jadwal
    Route::get('/jadwal', [AdminController::class, 'ShowJadwal'])->name('adm.jadwal');
    Route::post('/jadwal', [SkripsiController::class, 'show'])->name('adm.jadwal');
});

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/auth/check', [AuthController::class, 'userPageHandler'])->name('auth.home');

// Route Login dan Register
Route::get('/register', [AuthController::class, 'showRegisterPage'])->name('registerpage');
Route::post('/register', [AuthController::class, 'storeInitialRegisterData'])->name('register.storeInitial');
Route::get('/register/data', [AuthController::class, 'showRegisterDataPage'])->name('registerDataPage');
Route::post('/register/submit', [AuthController::class, 'handleRegister'])->name('register.submit');

Route::get('/login', [AuthController::class, 'showLoginPage'])->name('login');
Route::post('/login/submit', [AuthController::class, 'handleLogin'])->name('login.submit');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/forgotPassword', [AuthController::class, 'showForgotPassword'])->name('forgotPasswordPage');
