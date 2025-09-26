<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'SuperAdmin',
                'email' => 'superadmin@example.com',
                'password' => Hash::make('superadmin1234'),
                'role' => 'superadmin',
                'profile' => '1758788252.png',
            ],
            [
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('admin1234'),
                'role' => 'admin',
                'profile' => '1758787697.png',
            ],
            [
                'name' => 'User1',
                'email' => 'user1@example.com',
                'password' => Hash::make('user1234'),
                'role' => 'user',
                'profile' => '1751812501.jpg'
            ],
        ];

        foreach ($users as $user) {
            DB::table('users')->updateOrInsert(
                ['email' => $user['email']], // unique key
                array_merge($user, [
                    'created_at' => now(),
                    'updated_at' => now(),
                ])
            );
        }
    }
}
