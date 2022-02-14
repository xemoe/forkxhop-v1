<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PasswordConfirmationTest extends TestCase
{
    use RefreshDatabase;

    const ROUTE_AUTH_PASSWORD_CONFIRM = 'auth.password.confirm';
    const ROUTE_AUTH_PASSWORD_STORE = 'auth.password.store';

    public function test_confirm_password_screen_can_be_rendered()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route($this::ROUTE_AUTH_PASSWORD_CONFIRM));

        $response->assertOk();
    }

    public function test_password_can_be_confirmed()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route($this::ROUTE_AUTH_PASSWORD_STORE), [
            'password' => 'password',
        ]);

        $response->assertRedirect();
        $response->assertSessionHasNoErrors();
    }

    public function test_password_is_not_confirmed_with_invalid_password()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route($this::ROUTE_AUTH_PASSWORD_STORE), [
            'password' => 'wrong-password',
        ]);

        $response->assertSessionHasErrors();
    }
}
