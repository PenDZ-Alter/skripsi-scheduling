<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('dashboard.home');
});

Route::post('/upload-photo', [ProfileController::class, 'uploadPhoto'])->name('route_upload_photo');

