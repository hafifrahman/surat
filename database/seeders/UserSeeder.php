<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::insert([
            ['name' => 'admin'],
            ['name' => 'user'],
        ]);

        User::factory()->createMany([
            [
                'name' => 'Test User',
                'email' => 'test@example.com',
                'password' => 'test',
                'role_id' => 1,
            ],
            [
                'name' => 'User',
                'email' => 'user@example.com',
                'password' => 'user',
                'role_id' => 2,
            ]
        ]);

        User::factory(4)->create();
    }
}
