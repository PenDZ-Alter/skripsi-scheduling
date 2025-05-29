<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubjectsSchedule extends Model
{
    public $timestamps = true;

    protected $fillable = ['dosen', 'nama_matkul', 'jadwal_mulai', 'jadwal_selesai', 'kelas'];

    protected $casts = [
        'jadwal_mulai' => 'datetime',
        'jadwal_selesai' => 'datetime',
    ];


    public function dosenRelation(): BelongsTo
    {
        return $this->belongsTo(User::class, 'dosen');
    }
}
