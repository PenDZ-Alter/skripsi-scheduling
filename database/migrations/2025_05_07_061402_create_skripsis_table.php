<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('skripsis', function (Blueprint $table): void {
            $table->id();
            $table->unsignedBigInteger('user_id'); // mahasiswa yang punya skripsi
            $table->unsignedBigInteger('ruang_sidang');
            $table->unsignedBigInteger('dosen_pembimbing_1');
            $table->unsignedBigInteger('dosen_pembimbing_2');
            $table->string('judul');
            $table->datetime('jadwal_sidang');
            $table->enum('status', ['unverified', 'belum_sidang', 'lulus', 'revisi'])->default('unverified');
            $table->timestamps();
    
            // Relasi ke tabel users
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('ruang_sidang')->references('id')->on('ruang_sidangs')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('dosen_pembimbing_1')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('dosen_pembimbing_2')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skripsis');
    }
};
