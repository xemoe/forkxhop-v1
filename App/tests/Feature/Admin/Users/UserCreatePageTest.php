<?php

namespace Tests\Feature\Admin\Users;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class UsersCreatePageTest extends TestCase
{
    use RefreshDatabase;

    protected $seed = true;

    const ROUTE_AUTH_LOGIN = 'guest.login';
    const ROUTE_USERS_INDEX = 'admin.users.index';
    const ROUTE_USERS_CREATE = 'admin.users.create';
    const ROUTE_USERS_POST_CREATE = 'admin.users.post-create';

    public function test_root_user_can_access_users_create_page()
    {
        $user = User::factory()->create();
        $user->beRootUser();

        $resp = $this
            ->actingAs($user)
            ->get(route($this::ROUTE_USERS_CREATE));

        $resp->assertOk();
    }

    public function test_root_user_can_create_new_user()
    {
        $root = User::factory()->create();
        $root->beRootUser();

        $resp = $this
            ->actingAs($root)
            ->post(route($this::ROUTE_USERS_POST_CREATE), [
                'name' => 'Test User',
                'email' => 'test@example.com',
                'password' => 'password',
                'password_confirmation' => 'password',
            ]);

        $resp->assertRedirect(route($this::ROUTE_USERS_INDEX));
    }

    public function test_root_user_can_create_new_admin_user()
    {
        $root = User::factory()->create();
        $root->beRootUser();

        $resp = $this
            ->actingAs($root)
            ->post(route($this::ROUTE_USERS_POST_CREATE), [
                'name' => 'Test User',
                'email' => 'test@example.com',
                'password' => 'password',
                'password_confirmation' => 'password',
                'role' => User::ROLE_ADMIN_USER,
            ]);

        $resp->assertRedirect(route($this::ROUTE_USERS_INDEX));

        $createdUser = User::whereEmail('test@example.com')->first();
        $this->assertTrue($createdUser->isAdminUser());
    }

    public function test_root_user_can_create_new_simple_user()
    {
        $root = User::factory()->create();
        $root->beRootUser();

        $resp = $this
            ->actingAs($root)
            ->post(route($this::ROUTE_USERS_POST_CREATE), [
                'name' => 'Test User',
                'email' => 'test@example.com',
                'password' => 'password',
                'password_confirmation' => 'password',
                'role' => User::ROLE_SIMPLE_USER,
            ]);

        $resp->assertRedirect(route($this::ROUTE_USERS_INDEX));

        $createdUser = User::whereEmail('test@example.com')->first();
        $this->assertTrue($createdUser->isSimpleUser());
    }

    public function test_admin_user_can_access_users_create_page()
    {
        $user = User::factory()->create();
        $user->beAdminUser();

        $resp = $this
            ->actingAs($user)
            ->get(route($this::ROUTE_USERS_CREATE));

        $resp->assertOk();
    }

    public function test_admin_user_can_create_new_user()
    {
        $admin = User::factory()->create();
        $admin->beAdminUser();

        $resp = $this
            ->actingAs($admin)
            ->post(route($this::ROUTE_USERS_POST_CREATE), [
                'name' => 'Test User',
                'email' => 'test@example.com',
                'password' => 'password',
                'password_confirmation' => 'password',
            ]);

        $resp->assertRedirect(route($this::ROUTE_USERS_INDEX));
    }

    public function test_simple_user_cannot_access_users_create_page()
    {
        $user = User::factory()->create();
        $user->beSimpleUser();

        $resp = $this
            ->actingAs($user)
            ->get(route($this::ROUTE_USERS_CREATE));

        $resp->assertForbidden();
    }

    public function test_simple_user_cannot_create_new_user()
    {
        $simple = User::factory()->create();
        $simple->beSimpleUser();

        $resp = $this
            ->actingAs($simple)
            ->post(route($this::ROUTE_USERS_POST_CREATE), [
                'name' => 'Test User',
                'email' => 'test@example.com',
                'password' => 'password',
                'password_confirmation' => 'password',
            ]);

        $resp->assertForbidden();
    }

    public function test_guest_cannot_access_users_create_page()
    {
        $resp = $this->get(route($this::ROUTE_USERS_CREATE));

        $resp->assertRedirect(route($this::ROUTE_AUTH_LOGIN));
    }
}
