<?php

namespace Tests\Feature\Dashboard;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomeTest extends TestCase
{
    use RefreshDatabase;

    const ROUTE_AUTH_LOGIN = 'guest.login';
    const ROUTE_DASHBOARD_HOME = 'dashboard.home';

    public function test_dashboard_required_authenticated()
    {
        $resp = $this->get(route($this::ROUTE_DASHBOARD_HOME));

        $resp->assertRedirect(route($this::ROUTE_AUTH_LOGIN));
    }

    public function test_dashboard_home_screen_can_be_rendered()
    {
        $user = User::factory()->create();

        $resp = $this
            ->actingAs($user)
            ->get(route($this::ROUTE_DASHBOARD_HOME));

        $resp->assertOk();
    }
}
