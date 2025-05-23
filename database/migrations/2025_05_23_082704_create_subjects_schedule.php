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
        Schema::create('subjects_schedule', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dosen');
            $table->string('nama_matkul');
            $table->datetime('jadwal');
            $table->string('kelas');
            $table->timestamps();

            // Relasi Tabel
            $table->foreign('dosen')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subjects_schedule');
    }
};
