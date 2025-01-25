<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'create rooms']);
        Permission::create(['name' => 'edit rooms']);
        Permission::create(['name' => 'delete rooms']);
        Permission::create(['name' => 'get all bookings']);
        Permission::create(['name' => 'get all rooms']);

        Permission::create(['name' => 'create bookings']);
        Permission::create(['name' => 'edit bookings']);
        Permission::create(['name' => 'delete bookings']);
        Permission::create(['name' => 'get own bookings']);
    }
}
