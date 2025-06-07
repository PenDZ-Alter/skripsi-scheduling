<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class MahasiswaController extends Controller
{
    public function showStudentData()
    {
        // Ambil data user yang lagi login
         $mahasiswa = User::where('role', 'mahasiswa')->get();

        // Kirim ke view
        return view('dashboard.admin.profile', compact('mahasiswa'));
    }
}
