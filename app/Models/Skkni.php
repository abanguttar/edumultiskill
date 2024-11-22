<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skkni extends Model
{
    use HasFactory;

    protected $table = 'skknis';

    protected $fillable = [
        'kelas_id',
        'skkni',
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
}
