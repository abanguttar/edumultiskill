<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelasKategori extends Model
{
    use HasFactory;

    protected $table = 'kelas_kategori';

    protected $fillable = [
        'nama_kategori',
        'icon_kategori',
        'update_by',
        'updated_date'
    ];

    public $timestamps = false;

    protected $casts = [
        'updated_date' => 'datetime',
    ];

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'update_by');
    }
    
    protected static function boot()
    {
        parent::boot();
        
        // Auto-set update_by and updated_date when model is saved
        static::saving(function ($model) {
            $model->update_by = auth()->id();
            $model->updated_date = now();
        });
    }
}