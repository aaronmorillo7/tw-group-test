<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    public function run(): void
    {
        Permission::create(['name' => 'create_room']);
        Permission::create(['name' => 'update_room']);
        Permission::create(['name' => 'delete_room']);
        Permission::create(['name' => 'get_bookings']);
        Permission::create(['name' => 'get_rooms']);
        Permission::create(['name' => 'get_room']);
        Permission::create(['name' => 'create_booking']);
        Permission::create(['name' => 'get_bookings_by_room']);
        Permission::create(['name' => 'update_bookings']);
    }
}
