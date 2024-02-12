<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'user']);
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'shop_worker']);
        Role::create(['name' => 'warehouse_worker']);
        Role::create(['name' => 'shop_manager']);
        Role::create(['name' => 'warehouse_manager']);
    }
}
