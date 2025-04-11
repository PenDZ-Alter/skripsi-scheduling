<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('dashboard.home');
});

Route::get('/home', function() {
    return view('dashboard.home');
})->name('home');

Route::get('/profile', function() {
    return view('profile_mahasiswa.profile');
})->name('profile');

Route::post('/upload-photo', [ProfileController::class, 'uploadPhoto'])->name('route_upload_photo');

