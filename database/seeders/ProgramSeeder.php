<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('programs')->truncate();
        $programs = [
            'Umum',
            'Prakerja',
            'Sertifikasi BNSP',
        ];
        foreach ($programs as $key => $program) {
            $mockData = [
                'name' => $program
            ];
            DB::table('programs')->insert($mockData);
        }
    }
}
