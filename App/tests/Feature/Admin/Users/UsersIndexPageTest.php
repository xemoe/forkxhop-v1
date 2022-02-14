<?php

namespace Tests\Feature\Admin\Users;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UsersIndexPageTest extends TestCase
{
    use RefreshDatabase;

    protected $seed = true;

    const ROUTE_AUTH_LOGIN = 'guest.login';
    const ROUTE_USERS_INDEX = 'admin.users.index';

    public function test_root_user_can_access_users_index_page()
    {
        $user = User::factory()->create();
        $user->beRootUser();

        $resp = $this
            ->actingAs($user)
            ->get(route($this::ROUTE_USERS_INDEX));

        $resp->assertOk();
    }

    public function test_admin_user_can_access_users_index_page()
    {
        $user = User::factory()->create();
        $user->beAdminUser();

        $resp = $this
            ->actingAs($user)
            ->get(route($this::ROUTE_USERS_INDEX));

        $resp->assertOk();
    }

    public function test_admin_user_can_see_users_table()
    {
        $user = User::factory()->create();
        $user->beAdminUser();

        $resp = $this
            ->actingAs($user)
            ->get(route($this::ROUTE_USERS_INDEX));

        $resp->assertOk();

        $escaped = false; // not strip_tags
        $resp->assertSee('<td>' . $user->name . '</td>', $escaped);
        $resp->assertSee('<td>' . $user->email . '</td>', $escaped);
    }

    public function test_simple_user_cannot_access_users_index_page()
    {
        $user = User::factory()->create();
        $user->beSimpleUser();

        $resp = $this
            ->actingAs($user)
            ->get(route($this::ROUTE_USERS_INDEX));

        $resp->assertForbidden();
    }

    public function test_guest_cannot_access_users_index_page()
    {
        $resp = $this->get(route($this::ROUTE_USERS_INDEX));

        $resp->assertRedirect(route($this::ROUTE_AUTH_LOGIN));
    }
}
