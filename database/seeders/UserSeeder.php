<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create User Admin

        User::create([
            'name' => "Guru",
            'email' => "teacher@mathcamp.test",
            'password' => Hash::make('123456'),
            'role' => "teacher",
            'status' => "active",
        ]);
    }
}
