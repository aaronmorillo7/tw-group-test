<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleHasPermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::findByName('admin');
        $admin->givePermissionTo(['create_room', 'update_room', 'delete_room', 'get_bookings', 'get_bookings_by_room', 'get_rooms', 'get_room', 'update_bookings']);

        $client = Role::findByName('client');
        $client->givePermissionTo(['create_booking', 'get_bookings']);
    }
}
