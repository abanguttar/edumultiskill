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
            ['name' => 'Luring', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Webinar', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Self Paced Learning', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Video Learning', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];

        // $insertData = ['name' => 'Luring', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()];


        DB::table('metode_pelatihans')->insert($data);
    }
}
