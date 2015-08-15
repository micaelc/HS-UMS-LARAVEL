<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Role::create([
            'name' => 'admin',
            'display_name' => 'Administrator',
            'description' => 'Administrator Role'
        ]);

        \App\Role::create([
            'name' => 'manager',
            'display_name' => 'Manager',
            'description' => 'Manager Role'
        ]);

        \App\Role::create([
            'name' => 'user',
            'display_name' => 'Registered User',
            'description' => 'Registered User Role'
        ]);
    }
}
