<?php

use App\Permission;
use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class ACLTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         *   P E R M I S S I O N S
         */

        $perm1 = Permission::create([
            'name' => 'edit_profile',
            'display_name' => 'Edit Profile',
            'description' => 'Ability to edit user profile'
        ]);

        $perm2 = Permission::create([
            'name' => 'edit_user',
            'display_name' => 'Edit Users',
            'description' => ''
        ]);

        /**
         *   R O L E S
         */

        $role1 = Role::create([
            'name' => 'admin',
            'display_name' => 'Administrator',
            'description' => 'Administrator Role'
        ]);

        $role2 = Role::create([
            'name' => 'manager',
            'display_name' => 'Manager',
            'description' => 'Manager Role'
        ]);
        $role2->attachPermissions([$perm2->id]);;

        $role3 = Role::create([
            'name' => 'user',
            'display_name' => 'Registered User',
            'description' => 'Registered User Role'
        ]);
        $role3->attachPermissions([$perm1->id]);

        /**
         *   U S E R S
         */

        $user1 = User::create([
            'firstName' => 'Admin',
            'lastName' => 'User',
            'email' => 'admin@example.com',
            'password' => bcrypt('xptoxpto'),
            'status' => true
        ]);
        $user1->attachRole($role1);

        $user2 = User::create([
            'firstName' => 'Manager',
            'lastName' => 'User',
            'email' => 'manager@example.com',
            'password' => bcrypt('xptoxpto'),
            'status' => true
        ]);
        $user2->attachRole($role2);

        $user3 = User::create([
            'firstName' => 'Registered',
            'lastName' => 'User',
            'email' => 'user@example.com',
            'password' => bcrypt('xptoxpto'),
            'status' => true
        ]);
        $user3->attachRole($role3);
    }
}
