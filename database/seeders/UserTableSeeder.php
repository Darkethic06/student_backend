<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superAdminUser = User::create([
            'first_name' => "Admin",
            'last_name' => "Admin",
            'email' => "admin@admin.com",
            'password' => "11111111",
        ]);
        $superAdminUser->assignRole('SUPER-ADMIN');
        User::factory(10)->create()->each(function ($user) {
            $user->assignRole('TEACHER');
        });
        User::factory(10)->create()->each(function ($user) {
            $user->assignRole('STUDENT');
        });
    }
}
