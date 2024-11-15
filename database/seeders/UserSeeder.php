<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::truncate();

        $mockData =
            [
                'id' => 4,
                'username' => 'superadmin',
                'password' => Hash::make('123456'),
                'name' => 'Super Admin',
                'tipe_user' => 99,
                'user_create' => 1,
                'user_update' => 1,
                'is_active' => '1'
            ];


        User::create($mockData);
    }
}
