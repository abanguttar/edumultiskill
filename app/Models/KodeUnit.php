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
    ];


    public $timestamps = false;
}
