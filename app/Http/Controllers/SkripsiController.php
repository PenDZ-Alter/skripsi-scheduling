<?php

namespace App\Http\Controllers;

use App\Models\Skripsi;
use App\Models\User;
use App\Models\SubjectsSchedule;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\RuangSidang;

class SkripsiController extends Controller
{
    public function show()
        {
            $mahasiswa = User::where('role', 'mahasiswa')->get();
            $dosen = User::where('role', 'dosen')->get();
            $ruangs = RuangSidang::all();

            return view('dashboard.admin.jadwal', compact('mahasiswa', 'dosen', 'ruangs'));
        }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'judul' => 'required|string',
            'dosen_pembimbing_1' => 'required|exists:users,id',
            'dosen_pembimbing_2' => 'required|exists:users,id'
        ]);

        // Cek apakah mahasiswa sudah pernah daftar skripsi
        $existing = Skripsi::where('user_id', $validated['user_id'])->first();
        if ($existing) {
            return back()->withErrors(['message' => 'Mahasiswa sudah mendaftarkan sidang sebelumnya.']);
        }

        $maxAttempts = 10; // Biar gak infinite loop
        $attempt = 0;
        $conflict = true;
        $mulai = $selesai = null;

        do {
            $daysAhead = rand(2, 4);
            $startHour = rand(8, 14);

            $mulai = Carbon::now()->addDays($daysAhead)->setHour($startHour)->setMinute(0)->setSecond(0);
            $selesai = (clone $mulai)->addHour();

            $hari = $this->mapHari($mulai);
            $jamMulai = $mulai->format('H:i:s');
            $jamSelesai = $selesai->format('H:i:s');

            $isConflict1 = $this->isTimeConflict($validated['dosen_pembimbing_1'], $hari, $jamMulai, $jamSelesai);
            $isConflict2 = $this->isTimeConflict($validated['dosen_pembimbing_2'], $hari, $jamMulai, $jamSelesai);

            if (!$isConflict1 && !$isConflict2) {
                $conflict = false;
                break;
            }

            $attempt++;
        } while ($attempt < $maxAttempts);

        if ($conflict) {
            return back()->withErrors(['message' => 'Tidak dapat menemukan jadwal yang cocok. Coba lagi nanti.']);
        }

        $ruangAcak = RuangSidang::inRandomOrder()->first();

        try {
            Skripsi::create([
                ...$validated,
                'ruang_sidang' => $ruangAcak->id,
                'jadwal_mulai' => $mulai,
                'jadwal_selesai' => $selesai,
                'status' => 'pending'
            ]);
        } catch (\Exception $e) {
            logger('❌ Gagal insert skripsi:', ['error' => $e->getMessage()]);
            dd($e);
            return back()->withErrors(['internal' => 'Gagal menyimpan data.']);
        }

        return redirect()->back()->with('success', 'Skripsi berhasil didaftarkan dan menunggu verifikasi.');
    }

    public function edit($id)
    {
        $skripsi = Skripsi::with(['mahasiswa', 'pembimbing1', 'pembimbing2', 'ruang'])->findOrFail($id);
        $ruang_sidang = RuangSidang::all();
        return view('skripsi.edit', compact('skripsi', 'ruang_sidang'));
    }

    public function update(Request $request, $id)
    {
        $skripsi = Skripsi::findOrFail($id);

        // dd($skripsi);

        $validated = $request->validate([
            'jadwal_mulai' => 'required|date',
            'jadwal_selesai' => 'required|date|after:jadwal_mulai',
            'ruang_sidang' => 'required|exists:ruang_sidangs,id',
            'status' => 'required|in:pending,terjadwal,selesai'
        ]);

        $mulai = Carbon::parse($validated['jadwal_mulai']);
        $selesai = Carbon::parse($validated['jadwal_selesai']);

        $hari = $this->mapHari($mulai);
        $jamMulai = $mulai->format('H:i:s');
        $jamSelesai = $selesai->format('H:i:s');

        // Cek bentrok dosen
        $isConflict1 = $this->isTimeConflict($skripsi->dosen_pembimbing_1, $hari, $jamMulai, $jamSelesai);
        $isConflict2 = $this->isTimeConflict($skripsi->dosen_pembimbing_2, $hari, $jamMulai, $jamSelesai);

        if ($isConflict1 || $isConflict2) {
            return back()->withErrors(['jadwal_mulai' => 'Jadwal bentrok dengan jadwal dosen.'])->withInput();
        }

        try {
            $skripsi->update([
                'jadwal_mulai' => $mulai,
                'jadwal_selesai' => $selesai,
                'ruang_sidang' => $validated['ruang_sidang'],
                'status' => $validated['status']
            ]);
        } catch (\Exception $e) {
            dd($e);
            logger('❌ Gagal update skripsi:', ['error' => $e->getMessage()]);
            return back()->withErrors(['internal' => 'Gagal memperbarui data.']);
        }


        return redirect()->route('admin.skripsi.index')->with('success', 'Data skripsi berhasil diperbarui.');
    }

    private function isTimeConflict($dosenId, $hari, $jamMulai, $jamSelesai)
    {
        return SubjectsSchedule::where('dosen', $dosenId)
            ->where('hari', $hari)
            ->where(function ($query) use ($jamMulai, $jamSelesai) {
                $query->whereBetween('jam_mulai', [$jamMulai, $jamSelesai])
                    ->orWhereBetween('jam_selesai', [$jamMulai, $jamSelesai])
                    ->orWhere(function ($query) use ($jamMulai, $jamSelesai) {
                        $query->where('jam_mulai', '<', $jamMulai)
                            ->where('jam_selesai', '>', $jamSelesai);
                    });
            })
            ->exists();
    }

    private function mapHari($carbonDate)
    {
        $map = [
            'Monday' => 'senin',
            'Tuesday' => 'selasa',
            'Wednesday' => 'rabu',
            'Thursday' => 'kamis',
            'Friday' => 'jumat',
            'Saturday' => 'sabtu',
            'Sunday' => 'minggu', // buat jaga-jaga, walau gak dipakai
        ];

        return $map[$carbonDate->format('l')] ?? null;
    }
}
