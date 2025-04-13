<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

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

Route::post('/upload-photo', [ProfileController::class, 'uploadPhoto'])->name('route_upload_photo');

