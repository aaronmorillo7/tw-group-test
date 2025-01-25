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
        $admin->givePermissionTo(['create rooms', 'edit rooms', 'delete rooms', 'get all bookings', 'get all rooms']);

        $client = Role::findByName('client');
        $client->givePermissionTo(['create bookings', 'edit bookings', 'delete bookings', 'get own bookings']);
    }
}
