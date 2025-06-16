<?php

namespace Database\Seeders;

use App\Models\RuangSidang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RuangSidangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 15; $i++) {
            RuangSidang::create([
                'nama_ruang' => fake()->userName(),
                'nomor_ruang' => fake()->randomNumber()
            ]);
        }
    }
}
