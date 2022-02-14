<?php

namespace Tests\Feature\Auth;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    const ROUTE_GUEST_REGISTER_CREATE = 'guest.register.create';
    const ROUTE_GUEST_REGISTER_STORE = 'guest.register.store';

    public function test_registration_screen_can_be_rendered()
    {
        $response = $this->get(route($this::ROUTE_GUEST_REGISTER_CREATE));

        $response->assertOk();
    }

    public function test_new_users_can_register()
    {
        $response = $this->post(route($this::ROUTE_GUEST_REGISTER_STORE), [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);
    }
}
