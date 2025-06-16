<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RuangSidang extends Model
{
    public $timestamps = false;

    protected $fillable = ['nama_ruang', 'nomor_ruang'];
}