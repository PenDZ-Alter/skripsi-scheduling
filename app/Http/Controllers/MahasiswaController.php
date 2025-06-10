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

    public function edit($id)
    {
        $mahasiswa = User::findOrFail($id);
        return view('dashboard.admin.edit-profile', compact('mahasiswa'));
    }

    public function destroy($id)
    {
        $mahasiswa = User::findOrFail($id);
        $mahasiswa->delete();

        return redirect()->route('adm.profile')->with('success', 'Data mahasiswa berhasil dihapus.');
    }
}
