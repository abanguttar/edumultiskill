<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skkni extends Model
{
    use HasFactory;

    protected $table = 'skkni';

    protected $fillable = [
        'kelas_id',
        'skkni',
    ];


    public $timestamps = false;
}
