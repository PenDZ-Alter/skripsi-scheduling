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
            return view('dashboard.mahasiswa.home', compact('user'));
        } else {
            return abort(403, "Role is unknown!");
        }
    }

    public function showSkripsi() {
        $dosen = User::where('role', 'dosen')->get();
        $user = auth()->user();

        if (!$dosen) {
            return redirect()->route('mhs.home');
        }

        return view('dashboard.mahasiswa.skripsi', compact('dosen', 'user'));
    }
    
    public function showStatistik() {
        $user = auth()->user();
        
        return view('dashboard.mahasiswa.statistik', compact('user'));
    }

    public function showStudi() {
        $user = auth()->user();

        return view('dashboard.mahasiswa.studi', compact('user'));
    }

    public function showTranskrip() {
        $user = auth()->user();

        return view('dashboard.mahasiswa.transkrip', compact('user'));
    }

    public function showPembayaran() {
        $user = auth()->user();

        return view('dashboard.mahasiswa.pembayaran', compact('user'));
    }

    public function showProfileEdit() {
        $user = auth()->user();

        return view('dashboard.mahasiswa.profileEdit', compact('user'));
    }
}
