<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';

    protected $fillable = [
        'kelas_kategori_id',
        'judul_kelas',
        'slug',
        'program',
        'is_dudika',
        'image',
        'video',
        'course_code',
        'status_kelas',
        'jenis',
        'partner_id',
        'metode_pelatihan',
        'level',
        'okupasi',
        'jenjang_pendidikan',
        'unggulan',
        'best_seller',
        'tag_kelas',
        'harga_reguler',
        'harga_discount',
        'is_discount',
        'approval_free',
        'voucher_use',
        'tutor_id',
        'tutor_penilai_satu',
        'tutor_penilai_dua',
        'tutor_profesi',
        'user_create',
        'user_update',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_update', 'id');
    }

    public function kategori()
    {
        return $this->belongsTo(KelasKategori::class, 'kelas_kategori_id', 'id');
    }


    public function deskripsi()
    {
        return $this->hasOne(KelasDetail::class, 'kelas_id', 'id');
    }
}
