<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelasDetail extends Model
{
    use HasFactory;

    protected $table = 'kelas_details';

    protected $fillable = [
        'kelas_id',
        'judul_keterangan',
        'deskripsi',
        'metode_pembelajaran',
        'fasilitator',
        'sertifikat_judul',
        'sertifikat_judul_skkni',
        'sertifikat_judul_kode_unit',
        'sertifikat_tenaga_pelatih',
        'sertifikat_metode_satu',
        'sertifikat_metode_dua',
    ];


    public $timestamps = false;
}
