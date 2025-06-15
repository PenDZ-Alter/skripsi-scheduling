<?php

namespace Database\Seeders;

use App\Models\SubjectsSchedule;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userIds = User::where('role', 'dosen')->pluck('id')->toArray();

        if (empty($userIds)) {
            throw new \Exception('Tidak ada user dengan role dosen. Seeder gagal.');
        }

        for ($i = 0; $i < 10; $i++) {
            $startHour = fake()->numberBetween(7, 17); // jam mulai antara 07:00 - 17:00
            $jamMulai = Carbon::createFromTime($startHour, 0, 0);
            $jamSelesai = (clone $jamMulai)->addHours(2); // durasi 1 jam
            
            SubjectsSchedule::create([
                'dosen' => $userIds[array_rand($userIds)],
                'nama_matkul' => fake()->word(),
                'hari' => fake()->randomElement(['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu']),
                'jam_mulai' => $jamMulai->format('H:i:s'),
                'jam_selesai' => $jamSelesai->format('H:i:s'),
                'kelas' => fake()->randomElement(['A', 'B', 'C', 'D', 'E']),
            ]);
        }
    }
}
