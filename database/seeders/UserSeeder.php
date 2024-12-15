<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Import the DB facade
use Illuminate\Support\Facades\Hash; // Import the Hash facade

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => '06732028',
            'password' => Hash::make('student'), // Replace 'your_password_here' with the desired password
            'role' => 'student', // Default role
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
