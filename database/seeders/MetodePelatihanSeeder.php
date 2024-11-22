<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MetodePelatihanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('metode_pelatihans')->truncate();
        $data = [
            ['name' => 'Daring Webinar', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Daring Video Learning', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Luring', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Hybrid', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];

        // $insertData = ['name' => 'Luring', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()];


        DB::table('metode_pelatihans')->insert($data);
    }
}
