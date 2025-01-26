<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CreateClientsSeeder extends Seeder
{
    public function run(): void
    {
        $firstClient = User::create([
            'email' => 'jesusg@test.com',
            'first_name' => 'Jesus',
            'last_name' => 'Gonzales',
            'genre' => 'm',
            'birth_date' => '1999-01-01', 
            'phone' => '+58123456723', 
            'password' => Hash::make('123456789'),
        ]);
        $secondClient = User::create([
            'email' => 'anar@test.com',
            'first_name' => 'Ana',
            'last_name' => 'Ramirez',
            'genre' => 'f',
            'birth_date' => '1999-12-01', 
            'phone' => '+58123456456', 
            'password' => Hash::make('123456789'),
        ]);
        $firstClient->assignRole('client');
        $secondClient->assignRole('client');
    }
}
