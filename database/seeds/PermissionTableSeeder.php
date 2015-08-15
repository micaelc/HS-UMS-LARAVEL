<?php

use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            'name' => 'edit_profile',
            'display_name' => 'Edit Profile',
            'description' => 'Ability to edit user profile'
        ]);

        Permission::create([
            'name' => 'edit_user',
            'display_name' => 'Edit Users',
            'description' => ''
        ]);
    }
}
