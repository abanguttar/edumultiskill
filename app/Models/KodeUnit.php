<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KodeUnit extends Model
{
    use HasFactory;

    protected $table = 'kode_units';

    protected $fillable = [
        'kelas_id',
        'kode_unit',
        'keterangan',
        'create_by',
        'update_by'
    ];

    public $timestamps = true;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->create_by = auth()->id();
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
}
