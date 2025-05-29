<?php

namespace Database\Seeders;

use App\Models\SubjectsSchedule;
use App\Models\User;
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
            SubjectsSchedule::create([
                'dosen' => $userIds[array_rand($userIds)],
                'nama_matkul' => fake()->word(),
                'jadwal_mulai' => fake()->dateTimeBetween('+1 days', '+2 days'),
                'jadwal_selesai' => fake()->dateTimeBetween('+2 days', '+3 days'),
                'kelas' => fake()->randomElement(['A', 'B', 'C', 'D', 'E']),
            ]);
        }
    }
}
