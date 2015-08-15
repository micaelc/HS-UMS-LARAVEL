<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'firstName' => 'Admin',
            'lastName' => 'User',
            'email' => 'admin@example.com',
            'password' => bcrypt('xptoxpto#'),
            'status' => true
        ]);

        User::create([
            'firstName' => 'Manager',
            'lastName' => 'User',
            'email' => 'manager@example.com',
            'password' => bcrypt('xptoxpto#'),
            'status' => true
        ]);

        User::create([
            'firstName' => 'Registered',
            'lastName' => 'User',
            'email' => 'user@example.com',
            'password' => bcrypt('xptoxpto#'),
            'status' => true
        ]);

    }
}
