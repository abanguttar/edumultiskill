<?php

namespace Database\Seeders;

use App\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $permissions = [
            new Permission("data_master", "list_admin"),
            new Permission("data_master", "list_admin", ['access']),
            new Permission("lms", "kelas_kategori"),
            new Permission("lms", "kelas", ['view', 'create', 'delete', 'up status', 'down status', 'informasi', 'deskripsi', 'skkni', 'rating']),
            new Permission("lms", "skkni"),
            new Permission("lms", "kode unit"),
            new Permission("lms", "rating"),
        ];


        foreach ($permissions as $key => $permission) {
            $group = $permission->group;
            $name = $permission->name;
            foreach ($permission->access as  $access) {
                $data = [
                    'group' => $group,
                    'name' => $name,
                    'access' => $access,
                ];
                DB::table('permissions')->insert($data);
            }
        }
    }
}
