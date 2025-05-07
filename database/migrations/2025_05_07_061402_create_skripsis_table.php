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
        Schema::create('skripsis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // mahasiswa yang punya skripsi
            $table->string('judul');
            $table->string('dosen_pembimbing');
            $table->date('jadwal_sidang')->nullable();
            $table->enum('status', ['belum_sidang', 'lulus', 'revisi'])->default('belum_sidang');
            $table->timestamps();
    
            // Relasi ke tabel users
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
