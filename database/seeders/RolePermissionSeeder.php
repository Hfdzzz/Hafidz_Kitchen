<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolepermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name'=>'tambah-data']);
        Permission::create(['name'=>'edit-data']);
        Permission::create(['name'=>'hapus-data']);

        Role::create(['name'=>'admin']);

        $roleAdmin = Role::findByName('admin');
        $roleAdmin->givePermissionTo('tambah-data');
        $roleAdmin->givePermissionTo('edit-data');
        $roleAdmin->givePermissionTo('hapus-data');
    }
}
