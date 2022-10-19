<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
           'role-list',
           'role-create',
           'role-edit',
           'role-delete',
           'user-list',
           'user-create',
           'user-edit',
           'user-delete',
           'qr-create',
           'qr-list',
           'qr-download',
           'qr-edit',
           'qr-delete',
           'qr-export',
           'pc-list',
           'pc-create',
           'pc-edit',
           'pc-show',
           'pc-qr-generate',
           'pc-print',
           'pc-delete',
           'pc-export',

        ];
     
        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}
