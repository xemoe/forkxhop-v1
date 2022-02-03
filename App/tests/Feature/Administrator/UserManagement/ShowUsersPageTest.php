<?php

namespace Tests\Feature\Administrator\UserManagement;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ShowUsersPageTest extends TestCase
{
    use RefreshDatabase;

    const ROUTE_SHOW_USER_PAGE = 'admin.user-management.show';
    const ROUTE_CREATE_USER_PAGE = 'admin.user-management.create';

    //
    // @TODO
    // - [.] test_admin_can_access_show_user_page
    // - [ ] test_admin_can_access_create_user_page
    // - [ ] test_admin_can_create_new_user
    // - [ ] test_normal_user_cannot_access_show_user_page
    // - [ ] test_normal_user_cannot_access_create_user_page
    // - [ ] test_guest_cannot_access_show_user_page
    // - [ ] test_guest_cannot_access_create_user_page
    //

    public function test_admin_can_access_show_user_page()
    {
        $user = User::factory()->create();

        $resp = $this
            ->actingAs($user)
            ->get(route($this::ROUTE_SHOW_USER_PAGE));

        $resp->assertStatus(200);
    }

//    public function test_dashboard_required_authenticated()
//    {
//        $resp = $this->get(route($this::ROUTE_DASHBOARD_HOME_PAGE));
//
//        $resp->assertRedirect('/login');
//    }
//
//    public function test_dashboard_home_screen_can_be_rendered()
//    {
//        $user = User::factory()->create();
//
//        $resp = $this
//            ->actingAs($user)
//            ->get(route($this::ROUTE_DASHBOARD_HOME_PAGE));
//
//        $resp->assertStatus(200);
//    }
}
