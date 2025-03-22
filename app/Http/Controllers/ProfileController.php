<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function uploadPhoto(Request $request)
{
    if ($request->hasFile('photo')) {
        $file = $request->file('photo');
        $path = $file->storeAs('public/img', 'Alfariz.png'); // replace file lama
        return response()->json(['message' => 'Foto berhasil diunggah.']);
    }

    return response()->json(['message' => 'Tidak ada file dikirim.'], 400);
}

}
