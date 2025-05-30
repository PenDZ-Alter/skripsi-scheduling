<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function showProfile()
    {
        $user = auth()->user();
        return view('dashboard.mahasiswa.profile', compact('user'));
    }

}
