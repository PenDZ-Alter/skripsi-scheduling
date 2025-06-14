<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class MahasiswaController extends Controller
{
    public function index() {
        $user = auth()->user();

        return view('dashboard.mahasiswa.home', compact('user'));
    }

    public function showStudentData()
    {
        // Ambil data user yang lagi login
        $mahasiswa = User::where('role', 'mahasiswa')->get();

        // Kirim ke view
        return view('dashboard.admin.profile', compact('mahasiswa'));
    }

    public function edit($id)
    {
        $mahasiswaEdit = User::findOrFail($id);
        return view('dashboard.admin.profile', compact('mahasiswaEdit'));
    }

    public function destroy($id)
    {
        $mahasiswa = User::findOrFail($id);
        $mahasiswa->delete();

        return redirect()->route('adm.profile')->with('success', 'Data mahasiswa berhasil dihapus.');
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

    /** Profile Edit */
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
