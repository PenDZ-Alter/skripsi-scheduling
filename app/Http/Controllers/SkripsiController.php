<?php

namespace App\Http\Controllers;

use App\Models\Skripsi;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SkripsiController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'judul' => 'required|string',
            'dosen_pembimbing_1' => 'required|exists:users,id',
            'dosen_pembimbing_2' => 'required|exists:users,id',
            'ruang_sidang' => 'required|exists:ruang_sidangs,id',
            'jadwal_mulai' => 'required|date',
            'jadwal_selesai' => 'required|date|after:jadwal_mulai',
        ]);

        $mulai = Carbon::parse($validated['jadwal_mulai']);
        $selesai = Carbon::parse($validated['jadwal_selesai']);

        // Cek bentrok dengan jadwal dosen pembimbing 1 & 2
        if (
            $this->isTimeConflict($validated['dosen_pembimbing_1'], $mulai, $selesai) ||
            $this->isTimeConflict($validated['dosen_pembimbing_2'], $mulai, $selesai)
        ) {
            return back()->withErrors(['jadwal_mulai' => 'Jadwal bentrok dengan jadwal kuliah dosen.']);
        }

        Skripsi::create([
            ...$validated,
            'status' => 'unverified',
        ]);

        return redirect()->back()->with('success', 'Skripsi berhasil didaftarkan dan menunggu verifikasi.');
    }

    private function isTimeConflict($dosenId, $jadwalMulai, $jadwalSelesai)
    {
        return DB::table('subjects_schedules')
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

}
