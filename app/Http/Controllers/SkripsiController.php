<?php

namespace App\Http\Controllers;

use App\Models\Skripsi;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\RuangSidang;
use DateTime;

class SkripsiController extends Controller
{
    public function store(Request $request)
    {
        dd($request->all());
        
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'judul' => 'required|string',
            'dosen_pembimbing_1' => 'required|exists:users,id',
            'dosen_pembimbing_2' => 'required|exists:users,id'
        ]);
        
        logger('📤 Request data:', $validated);

        $daysAhead = rand(2, 4); // antara 2 s.d. 4 hari ke depan
        $startHour = rand(8, 14); // jam antara 08:00 - 14:00

        $mulai = Carbon::now()->addDays($daysAhead)->setHour($startHour)->setMinute(0)->setSecond(0);
        $selesai = (clone $mulai)->addHour();

        if (
            $this->isTimeConflict($validated['dosen_pembimbing_1'], $mulai, $selesai) ||
            $this->isTimeConflict($validated['dosen_pembimbing_2'], $mulai, $selesai)
        ) {
            return back()->withErrors(['jadwal_mulai' => 'Jadwal bentrok dengan jadwal kuliah dosen.']);
        }

        $ruangAcak = RuangSidang::inRandomOrder()->first();

        try {
            Skripsi::create([
                ...$validated,
                'ruang_sidang' => $ruangAcak->id,
                'jadwal_mulai' => $mulai,
                'jadwal_selesai' => $selesai,
                'status' => 'unverified'
            ]);
        } catch (\Exception $e) {
            logger('❌ Gagal insert skripsi:', ['error' => $e->getMessage()]);
            print_r($e);
            return back()->withErrors(['internal' => 'Gagal menyimpan data.']);
        }

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
