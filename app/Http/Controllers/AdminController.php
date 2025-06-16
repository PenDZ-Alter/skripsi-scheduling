<?php

namespace App\Http\Controllers;

use App\Models\RuangSidang;
use App\Models\Skripsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index()
    {
        $totalmahasiswa = User::where('role', 'mahasiswa')->count();

        return view("dashboard.admin.home", compact('totalmahasiswa'));
    }

    public function showDataAdminSidebar()
    {
        $adminData1 = auth()->user();

        return view('dashboard.admin.partials.sidebar', compact('adminData'));
    }

    public function showDataAdminHeader()
    {
        $adminData2 = auth()->user();

        return view('dashboard.admin.partials.header', compact('adminData'));
    }

    public function ShowJadwal()
    {
        $skripsis = Skripsi::with(['ruang'])->get();
        $ruangSidangList = RuangSidang::all();
        $mahasiswa = User::where('role', 'mahasiswa')->get();
        $dosen = User::where('role', 'dosen')->get();

        return view('dashboard.admin.jadwal', compact('skripsis', 'ruangSidangList', 'mahasiswa','dosen'));
    }

    public function updateStatusMahasiswa(Request $request, $id)
    {
        $request->validate([
            'is_ready' => 'required|boolean',
            'catatan' => 'nullable|string|max:500'
        ]);

        try {
            $mahasiswa = User::findOrFail($id);
            $mahasiswa->is_ready = $request->is_ready;
            $mahasiswa->save();

            $status = $mahasiswa->is_ready ? 'Terverifikasi (Siap Sidang)' : 'Belum Terverifikasi';
            
            return redirect()->back()->with('success', "Status mahasiswa {$mahasiswa->name} berhasil diubah menjadi: {$status}");
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal mengubah status verifikasi');
        }
    }

    // Method baru untuk verifikasi mahasiswa
    public function verifikasiMahasiswa(Request $request, $id)
    {
        try {
            $mahasiswa = User::findOrFail($id);
            
            // Toggle status is_ready
            $mahasiswa->is_ready = !$mahasiswa->is_ready;
            $mahasiswa->save();

            $status = $mahasiswa->is_ready ? 'terverifikasi' : 'belum terverifikasi';
            
            return redirect()->back()->with('success', 'Status sempro/semhas mahasiswa berhasil diubah');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong!!');
        }
    }
}
