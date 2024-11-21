<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalPelatihan extends Model
{
    use HasFactory;

    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'jadwal_pelatihans';

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'kelas_id',
        'judul_jadwal_pelatihan',
        'schedule_code', 
        'status',
        'tanggal_mulai',
        'tanggal_selesai',
        'waktu_pelaksanaan',
        'kuota',
        'diarsipkan'
    ];

    /**
    * The attributes that should be cast.
    *
    * @var array
    */
    protected $casts = [
        'tanggal_mulai' => 'date',
        'tanggal_selesai' => 'date',
    ];

    /**
    * Get the kelas that owns the jadwal pelatihan.
    */
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }
}