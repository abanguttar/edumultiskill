<?php

namespace Database\Seeders;

use App\Models\Kelas;
use App\Models\Topik;
use App\Models\Aktivitas;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TopikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Topik::truncate();
        Aktivitas::truncate();

        $kelas = Kelas::with('jadwalPelatihans')->first();

        $array = [
            'BAB I',
            'BAB II',
            'BAB III',
            'BAB IV',
        ];
        $kelas_id = $kelas->id;
        $jadwal_id = $kelas->JadwalPelatihans[0]->id;

        foreach ($array as $key => $a) {

            $urutan = Topik::where('jadwal_id', $jadwal_id)->count('urutan');
            $mockData = [
                'kelas_id' => $kelas_id,
                'jadwal_id' => $jadwal_id,
                'urutan' => ++$urutan,
                'nama_topik' => $array[$key],
                'durasi' => 60,
                'user_create' => 4,
                'user_update' => 4,
            ];
            Topik::create($mockData);
        }
    }
}
