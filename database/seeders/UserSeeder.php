<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [ 'admin', 'mahasiswa', 'dosen' ];
        $jk = [ 'lk', 'pr' ];
        
        for ($i = 0; $i < 15; $i++) {
            User::create([
                'name' => fake()->name(),
                'email' => fake()->unique()->safeEmail(),
                'password' => Hash::make('password'),
                'no_telp' => fake()->phoneNumber(),
                'jenis_kelamin' => $jk[array_rand($jk)],
                'alamat' => fake()->address(),
                'role' => $roles[array_rand($roles)],
                'nama_ortu' => fake()->name(),
                'domisili_ortu' => fake()->address(),
                'tanggal_lahir' => fake()->date(),
                'tempat_lahir' => fake()->city(),
                'is_ready' => fake()->boolean()
            ]);
        }
    }
}
