<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aktivitas extends Model
{
    use HasFactory;

    protected $fillable = [
        'urutan',
        'nama_aktivitas',
        'durasi',
        'bobot',
        'is_locked',
        'jenis',
        'kelas_id',
        'jadwal_id',
        'topik_id',
        'user_create',
        'user_update',
    ];
}
