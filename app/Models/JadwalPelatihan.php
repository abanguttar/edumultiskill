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
        'diarsipkan',
        'create_by',
        'update_by'
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

    public $timestamps = true;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->create_by = auth()->id();
        });
        
        static::updating(function ($model) {
            $model->update_by = auth()->id();
            return true; // Pastikan return true agar update berjalan
        });
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'create_by');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'update_by');
    }

    /**
    * Get the kelas that owns the jadwal pelatihan.
    */
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }
}