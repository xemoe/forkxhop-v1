<?php

namespace Tests\Feature\Administrator\UserManagement;

use App\Models\User;
use Database\Seeders\DefaultRolesAndPermissionsSeeder;
use Database\Seeders\DefaultUsersSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class ShowUsersPageTest extends TestCase
{
    use RefreshDatabase;

    protected $seed = true;

    const ROUTE_SHOW_USER = 'admin.user-management.show';
    const ROUTE_CREATE_USER = 'admin.user-management.create';

    //
    // @TODO
    // - [x] test_root_user_can_access_show_user_page
    // - [x] test_admin_user_can_access_show_user_page
    // - [.] test_root_user_can_access_create_user_page
    // - [.] test_admin_user_can_access_create_user_page
    // - [ ] test_admin_user_can_create_new_user
    // - [x] test_simple_user_cannot_access_show_user_page
    // - [.] test_simple_user_cannot_access_create_user_page
    // - [.] test_guest_cannot_access_show_user_page
    // - [.] test_guest_cannot_access_create_user_page
    //

    public function test_root_user_can_access_show_user_page()
    {
        $user = User::factory()->create();
        $user->beRootUser();

        $resp = $this
            ->actingAs($user)
            ->get(route($this::ROUTE_SHOW_USER));

        $resp->assertOk();
    }

    public function test_admin_user_can_access_show_user_page()
    {
        $user = User::factory()->create();
        $user->beAdminUser();

        $resp = $this
            ->actingAs($user)
            ->get(route($this::ROUTE_SHOW_USER));

        $resp->assertOk();
    }

    public function test_simple_user_cannot_access_show_user_page()
    {
        $user = User::factory()->create();
        $user->beSimpleUser();

        $resp = $this
            ->actingAs($user)
            ->get(route($this::ROUTE_SHOW_USER));

        $resp->assertForbidden();
    }

    public function test_guest_cannot_access_show_user_page()
    {
    }

    public function test_root_user_can_access_create_user_page()
    {

    }

    public function test_admin_user_can_access_create_user_page()
    {

    }

    public function test_simple_user_cannot_access_create_user_page()
    {
    }

    public function test_guest_cannot_access_create_user_page()
    {
    }
}
