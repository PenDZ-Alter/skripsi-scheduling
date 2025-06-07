<?php

namespace App\Http\Controllers;

use App\Models\Skripsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index() {
        return view("dashboard.admin.home");
    }

    public function edit($id)
    {
        $skripsi = Skripsi::with(['mahasiswa', 'pembimbing1', 'pembimbing2', 'ruang'])->findOrFail($id);
        return view('admin.skripsi.edit', compact('skripsi'));
    }

    public function update(Request $request, $id)
    {
        $skripsi = Skripsi::findOrFail($id);

        $validated = $request->validate([
            'jadwal_mulai' => 'required|date',
            'jadwal_selesai' => 'required|date|after:jadwal_mulai',
        ]);

        $mulai = Carbon::parse($validated['jadwal_mulai']);
        $selesai = Carbon::parse($validated['jadwal_selesai']);

        if (
            $this->isTimeConflict($skripsi->dosen_pembimbing_1, $mulai, $selesai) ||
            $this->isTimeConflict($skripsi->dosen_pembimbing_2, $mulai, $selesai)
        ) {
            return back()->withErrors(['jadwal_mulai' => 'Jadwal bentrok dengan jadwal kuliah dosen.']);
        }

        $skripsi->update([
            'jadwal_mulai' => $mulai,
            'jadwal_selesai' => $selesai,
            'status' => 'belum_sidang' // Admin udah fix-in, berarti oke lanjut sidang
        ]);

        return redirect()->route('admin.skripsi.edit', $skripsi->id)->with('success', 'Jadwal berhasil diperbarui.');
    }

    private function isTimeConflict($dosenId, $jadwalMulai, $jadwalSelesai)
    {
        return DB::table('subjects_schedule')
            ->where('dosen', $dosenId)
            ->where(function ($query) use ($jadwalMulai, $jadwalSelesai) {
                $query->whereBetween('jadwal_mulai', [$jadwalMulai, $jadwalSelesai])
                    ->orWhereBetween('jadwal_selesai', [$jadwalMulai, $jadwalSelesai])
                    ->orWhere(function ($q) use ($jadwalMulai, $jadwalSelesai) {
                        $q->where('jadwal_mulai', '<=', $jadwalMulai)
                          ->where('jadwal_selesai', '>=', $jadwalSelesai);
                    });
            })
            ->exists();
    }

    public function showDataAdminSidebar(){
        $adminData1 = auth()->user();

        return view('dashboard.admin.partials.sidebar', compact('adminData'));
    }

    public function showDataAdminHeader(){
        $adminData2 = auth()->user();

        return view('dashboard.admin.partials.header', compact('adminData'));
    }
}
