<?php

namespace Tests\Feature\Administrator\UserManagement;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class UsersCreatePageTest extends TestCase
{
    use RefreshDatabase;

    protected $seed = true;

    const ROUTE_AUTH_LOGIN = 'login';
    const ROUTE_USERS_CREATE = 'admin.users.create';

    public function test_root_user_can_access_users_create_page()
    {
        $user = User::factory()->create();
        $user->beRootUser();

        $resp = $this
            ->actingAs($user)
            ->get(route($this::ROUTE_USERS_CREATE));

        $resp->assertOk();
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

    public function test_simple_user_cannot_access_users_create_page()
    {
        $user = User::factory()->create();
        $user->beSimpleUser();

        $resp = $this
            ->actingAs($user)
            ->get(route($this::ROUTE_USERS_CREATE));

        $resp->assertForbidden();
    }

    public function test_guest_cannot_access_users_create_page()
    {
        $resp = $this->get(route($this::ROUTE_USERS_CREATE));

        $resp->assertRedirect(route($this::ROUTE_AUTH_LOGIN));
    }
}
