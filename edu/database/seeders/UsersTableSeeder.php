<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'role' => 'admin',
                'name' => 'Admin',
                'email' => 'admin@edu.com',
                'phone' => '0000000',
                'email_verified_at' => now(),
                'password' => Hash::make('edu1234'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'role' => 'user',
                'name' => 'User',
                'email' => 'user@edu.com',
                'phone' => '000000',
                'email_verified_at' => now(),
                'password' => Hash::make('edu1234'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
        ];

        User::insert($users);
    }
}
