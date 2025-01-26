<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CreateAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'email' => 'admin@test.com',
            'first_name' => 'super',
            'last_name' => 'admin',
            'genre' => 'm',
            'birth_date' => '1999-01-01', 
            'phone' => '+58123456789', 
            'password' => Hash::make('123456789'),
        ]);
        $user->assignRole('admin');
    }
}
