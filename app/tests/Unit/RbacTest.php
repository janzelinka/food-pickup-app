<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;

class RbacTest extends TestCase
{
    /**
     * Test admin RBAC.
     *
     * @return void
     */
    public function test_admin_rbac()
    {
        $admin = User::where('email', 'admin@example.com')->first();

        $this->assertNotNull($admin, 'Admin user not found');
        $this->assertTrue($admin->hasRole('admin'), 'Admin should have admin role');
        $this->assertTrue($admin->hasPermission('view_dashboard'), 'Admin should have permission view_dashboard');
        $this->assertTrue($admin->hasPermission('manage_users'), 'Admin should have permission manage_users');
    }

    /**
     * Test user RBAC.
     *
     * @return void
     */
    public function test_user_rbac()
    {
        $user = User::where('email', 'user@example.com')->first();

        $this->assertNotNull($user, 'User not found');
        $this->assertTrue($user->hasRole('user'), 'User should have user role');
        $this->assertFalse($user->hasRole('admin'), 'User should not have admin role');
        $this->assertTrue($user->hasPermission('view_dashboard'), 'User should have permission view_dashboard');
        $this->assertFalse($user->hasPermission('manage_users'), 'User should not have permission manage_users');
    }
}
