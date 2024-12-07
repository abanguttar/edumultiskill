<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SaranaPrasaranaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sarana_prasaranas')->truncate();

        $datas = [
            [
                'user_create' => 4,
                'user_update' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'name' => 'Meja Kantor',
                'condition' => 'Baik',
                'qty' => 4,
                'status' => 'Milik Sendiri',
            ],
            [
                'user_create' => 4,
                'user_update' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'name' => 'Meja Belajar',
                'qty' => 28,
                'condition' => 'Baik',
                'status' => 'Milik Sendiri',
            ],
            [
                'user_create' => 4,
                'user_update' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'name' => 'Kursi Staff',
                'qty' => 2,
                'condition' => 'Baik',
                'status' => 'Milik Sendiri',
            ],
            [
                'user_create' => 4,
                'user_update' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'name' => 'Laptop',
                'qty' => 5,
                'condition' => 'Baik',
                'status' => 'Milik Sendiri',
            ],
            [
                'user_create' => 4,
                'user_update' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'name' => 'Komputer',
                'qty' => 4,
                'condition' => 'Baik',
                'status' => 'Milik Sendiri',
            ],
            [
                'user_create' => 4,
                'user_update' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'name' => 'Printer',
                'qty' => 7,
                'condition' => 'Baik',
                'status' => 'Milik Sendiri',
            ],
        ];

        DB::table('sarana_prasaranas')->insert($datas);
    }
}
