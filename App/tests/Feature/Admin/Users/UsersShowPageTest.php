<?php

namespace Tests\Feature\Admin\Users;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UsersShowPageTest extends TestCase
{
    use RefreshDatabase;

    protected $seed = true;

    const ROUTE_AUTH_LOGIN = 'guest.login';
    const ROUTE_USERS_SHOW = 'admin.users.show';

    public function test_root_user_can_access_users_show_page()
    {
        $root = User::factory()->create();
        $root->beRootUser();

        $viewUser = User::factory()->create();

        $resp = $this
            ->actingAs($root)
            ->get(route($this::ROUTE_USERS_SHOW, ['user' => $viewUser]));

        $resp->assertOk();

        $resp->assertSee($viewUser->name);
        $resp->assertSee($viewUser->email);
    }

    public function test_admin_user_can_access_users_show_page()
    {
        $admin = User::factory()->create();
        $admin->beAdminUser();

        $viewUser = User::factory()->create();

        $resp = $this
            ->actingAs($admin)
            ->get(route($this::ROUTE_USERS_SHOW, ['user' => $viewUser]));

        $resp->assertOk();

        $resp->assertSee($viewUser->name);
        $resp->assertSee($viewUser->email);
    }

    public function test_simple_user_cannot_access_users_show_page()
    {
        $simple = User::factory()->create();
        $simple->beSimpleUser();

        $viewUser = User::factory()->create();

        $resp = $this
            ->actingAs($simple)
            ->get(route($this::ROUTE_USERS_SHOW, ['user' => $viewUser]));

        $resp->assertForbidden();
    }

    public function test_guest_cannot_access_users_show_page()
    {
        $user = User::factory()->create();
        $resp = $this->get(route($this::ROUTE_USERS_SHOW, ['user' => $user]));

        $resp->assertRedirect(route($this::ROUTE_AUTH_LOGIN));
    }
}
