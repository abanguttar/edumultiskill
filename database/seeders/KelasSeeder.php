<?php

namespace Database\Seeders;

use App\Models\Kelas;
use App\Models\KelasDetail;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kelas::truncate();
        KelasDetail::truncate();
        $judul = Str::random(20);
        Kelas::create([
            'kelas_kategori_id' => mt_rand(1, 4),
            'judul_kelas' => $judul,
            'slug' => Str::slug($judul),
            'program' => 0,
            'jenis' => 'umum',
            'metode_pelatihan' => 'Luring',
            'level' => 'pemula',
            'jenjang_pendidikan' => 'SMA,',
            'harga_reguler' => mt_rand(10000, 1000000),
            'harga_discount' => mt_rand(0, 1000000),
            'is_discount' => (string) mt_rand(0, 1),
            'user_create' => 4,
            'user_update' => 4,
        ]);
    }
}
