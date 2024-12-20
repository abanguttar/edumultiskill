<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topik extends Model
{
    use HasFactory;


    protected $fillable = [
        'urutan',
        'nama_topik',
        'durasi',
        'kelas_id',
        'jadwal_id',
        'user_create',
        'user_update',
    ];


    public function aktivitas()
    {
        return $this->hasMany(Aktivitas::class, 'topik_id', 'id');
    }
}
