<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminUserTest extends TestCase
{
    /**
     * Test admin can access users index.
     *
     * @return void
     */
    public function test_admin_can_access_users_index()
    {
        $admin = User::where('email', 'admin@example.com')->first();
        $this->actingAs($admin);

        $response = $this->get(route('admin.users.index'));
        $response->assertStatus(200);
        $response->assertSee('User Management');
    }

    /**
     * Test non-admin cannot access users index.
     *
     * @return void
     */
    public function test_non_admin_cannot_access_users_index()
    {
        $user = User::where('email', 'user@example.com')->first();
        $this->actingAs($user);

        $response = $this->get(route('admin.users.index'));
        $response->assertStatus(403);
    }

    /**
     * Test admin can create user.
     *
     * @return void
     */
    public function test_admin_can_create_user()
    {
        $admin = User::where('email', 'admin@example.com')->first();
        $this->actingAs($admin);

        // Cleanup in case it exists from previous run
        User::where('email', 'newtest@example.com')->delete();

        $response = $this->post(route('admin.users.store'), [
            'name' => 'New Test User',
            'email' => 'newtest@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertRedirect(route('admin.users.index'));
        $this->assertDatabaseHas('users', ['email' => 'newtest@example.com']);

        // Cleanup
        User::where('email', 'newtest@example.com')->delete();
    }
}
