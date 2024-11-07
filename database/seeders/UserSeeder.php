<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // Create admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'address' => 'Jl. Admin No. 1, Jakarta',
            'phone' => '08123456789',
            'role' => 'admin',
        ]);

        // Create 10 users
        for ($i = 0; $i < 10; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->unique()->email,
                'password' => Hash::make('password'),
                'address' => $faker->address,
                'phone' => $faker->phoneNumber,
                'role' => 'user',
            ]);
        }
    }
}
