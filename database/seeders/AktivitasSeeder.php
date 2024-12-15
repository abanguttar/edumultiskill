<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Kelas;
use App\Models\Topik;
use App\Models\Aktivitas;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AktivitasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Aktivitas::truncate();
        $kelas = Kelas::with('jadwalPelatihans')->first();
        $topik = Topik::where('jadwal_id', $kelas->jadwalPelatihans[0]->id)->first();

        $mockData = [
            'urutan' => 1,
            'nama_aktivitas' => 'Dummy Bacaan',
            'durasi' => 60,
            'bobot' => 12,
            'is_locked' => 0,
            'jenis' => 'bacaan',
            'kelas_id' => $kelas->id,
            'jadwal_id' => $kelas->jadwalPelatihans[0]->id,
            'topik_id' => $topik->id,
            'user_create' => 4,
            'user_update' => 4,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];

        $aktivitas = Aktivitas::create($mockData);
        DB::table('aktivitas_bacaans')->insert([
            'kelas_id' => $kelas->id,
            'jadwal_id' => $kelas->jadwalPelatihans[0]->id,
            'topik_id' => $topik->id,
            'aktivitas_id' => $aktivitas->id,
            'file' => Str::random(30),
            'intruksi' => Str::random(30),
            'user_create' => 4,
            'user_update' => 4,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
