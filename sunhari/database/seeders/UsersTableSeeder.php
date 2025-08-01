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
                'email' => 'admin@sunhari.com',
                'phone' => '0000000',
                'email_verified_at' => now(),
                'password' => Hash::make('sunhari'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'role' => 'user',
                'name' => 'User',
                'email' => 'user@sunhari.com',
                'phone' => '000000',
                'email_verified_at' => now(),
                'password' => Hash::make('sunhari'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
        ];

        User::insert($users);
    }
}
