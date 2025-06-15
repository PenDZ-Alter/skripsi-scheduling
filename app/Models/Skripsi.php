<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Skripsi extends Model
{
    protected $fillable = [
        'user_id',
        'ruang_sidang',
        'dosen_pembimbing_1',
        'dosen_pembimbing_2',
        'judul',
        'jadwal_mulai',
        'jadwal_selesai',
        'status',
    ];

    protected $casts = [
        'jadwal_mulai' => 'datetime',
        'jadwal_selesai' => 'datetime',
    ];


    // public function mahasiswa(): BelongsTo
    // {
    //     return $this->belongsTo(User::class, 'user_id');
    // }

    // public function ruang(): BelongsTo
    // {
    //     return $this->belongsTo(RuangSidang::class, 'ruang_sidang');
    // }

    // public function pembimbing1(): BelongsTo
    // {
    //     return $this->belongsTo(User::class, 'dosen_pembimbing_1');
    // }

    // public function pembimbing2(): BelongsTo
    // {
    //     return $this->belongsTo(User::class, 'dosen_pembimbing_2');
    // }

    public function mahasiswa()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function pembimbing1()
    {
        return $this->belongsTo(User::class, 'dosen_pembimbing_1');
    }

    public function pembimbing2()
    {
        return $this->belongsTo(User::class, 'dosen_pembimbing_2');
    }

    public function ruang()
    {
        return $this->belongsTo(RuangSidang::class, 'ruang_sidang');
    }
}
