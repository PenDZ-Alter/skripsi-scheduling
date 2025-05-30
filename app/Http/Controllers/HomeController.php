<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $user = auth()->user();

        if (!$user) {
            return redirect()->route('login'); // fallback klo belum login
        }

        $role = $user->role;

        if ($role == "admin") {
            return redirect()->route('adm.home');
        } else if ($role == "mahasiswa") {
            return view('dashboard.mahasiswa.home');
        } else {
            return abort(403, "Role is unknown!");
        }
    }

    public function showSkripsi() {
        $dosen = User::where('role', 'dosen')->get();

        if (!$dosen) {
            return redirect()->route('mhs.home');
        }

        return view('dashboard.mahasiswa.skripsi', compact('dosen'));
    }
}
