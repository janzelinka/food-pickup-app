<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create Permissions
        $viewDashboard = Permission::firstOrCreate(['code' => 'view_dashboard'], ['name' => 'View Dashboard']);
        $manageUsers = Permission::firstOrCreate(['code' => 'manage_users'], ['name' => 'Manage Users']);

        // Create Roles
        $adminRole = Role::firstOrCreate(['code' => 'admin'], ['name' => 'Admin']);
        $userRole = Role::firstOrCreate(['code' => 'user'], ['name' => 'User']);

        // Assign Permissions to Roles
        $adminRole->permissions()->syncWithoutDetaching([$viewDashboard->id, $manageUsers->id]);
        $userRole->permissions()->syncWithoutDetaching([$viewDashboard->id]);

        // Create Admin User
        $admin = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin User',
                'password' => Hash::make('password'),
            ]
        );
        $admin->roles()->syncWithoutDetaching([$adminRole->id]);

        // Create Regular User
        $user = User::firstOrCreate(
            ['email' => 'user@example.com'],
            [
                'name' => 'Dummy User',
                'password' => Hash::make('password'),
            ]
        );
        $user->roles()->syncWithoutDetaching([$userRole->id]);
    }
}
