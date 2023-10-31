<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $users = collect([
            [
                'name' => 'Super Admin',
                'email' => 'superadmin@dashcode.com',
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
                'role' => 'super-admin',
            ],
            [
                'name' => 'Admin',
                'email' => 'admin@dashcode.com',
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
                'role' => 'admin',
            ],
            [
                'name' => 'User',
                'email' => 'user@dashcode.com',
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
                'role' => 'user',
            ],
        ]);

        $users->map(function ($user) {
            $user = collect($user);
            $newUser = User::create($user->except('role')->toArray());
            $newUser->assignRole($user['role']);
        });
    }
}