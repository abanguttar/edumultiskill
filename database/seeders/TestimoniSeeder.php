<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TestimoniSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('testimonies')->truncate();

        $testimonies = [[
            'nama' => 'Hasna Nur Kamila',
            'kelas' => 'Mengimplementasikan K3 untuk Spesialis
K3 Industri Migas',
            'profesi' => 'HSE Trainee Officer',
            'ulasan' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Et accusantium consequuntur ratione quam inventore maxime ea laboriosam esse. Laudantium, sed.",
            'image' => 'thumb-sample-1.jpg',
            'urutan' => 1,
            'user_create' => 4,
            'user_update' => 4,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ], [
            'nama' => 'Siti Nurayah',
            'kelas' => 'Mengimplementasikan Teknik Investasi',
            'profesi' => 'HSE Trainee Officer',
            'ulasan' => 'Lorem ipsum dolor sit amet,
consectetuer adipiscing elit,
sed diam nonummy nibh
euismod tincidunt ut laoreet
dolore magna aliquam erat.',
            'image' => 'thumb-sample-1.jpg',
            'urutan' => 2,
            'user_create' => 4,
            'user_update' => 4,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],];
        DB::table('testimonies')->insert($testimonies);
    }
}
