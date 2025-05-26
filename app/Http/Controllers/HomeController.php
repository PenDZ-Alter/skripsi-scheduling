<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $user = auth()->user();

        if (!$user) {
            return redirect()->route('login'); // fallback klo belum login
        }

        switch ($user->role) {
            case 'admin':
                return redirect()->route('adm.home');
            case 'dosen':
                return redirect()->route('mhs.home');
            default:
                abort(403, 'Role tidak dikenali.');
        }
    }
}
