<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

class PasswordResetTest extends TestCase
{
    use RefreshDatabase;

    const ROUTE_GUEST_PASSWORD_REQUEST = 'guest.password.request';
    const ROUTE_GUEST_PASSWORD_EMAIL = 'guest.password.email';
    const ROUTE_GUEST_PASSWORD_RESET = 'guest.password.reset';
    const ROUTE_GUEST_PASSWORD_UPDATE = 'guest.password.update';

    public function test_reset_password_link_screen_can_be_rendered()
    {
        $response = $this->get(route($this::ROUTE_GUEST_PASSWORD_REQUEST));

        $response->assertOk();
    }

    public function test_reset_password_link_can_be_requested()
    {
        Notification::fake();

        $user = User::factory()->create();

        $this->post(route($this::ROUTE_GUEST_PASSWORD_EMAIL), ['email' => $user->email]);

        Notification::assertSentTo($user, ResetPassword::class);
    }

    public function test_reset_password_screen_can_be_rendered()
    {
        Notification::fake();

        $user = User::factory()->create();

        $this->post(route($this::ROUTE_GUEST_PASSWORD_EMAIL), ['email' => $user->email]);

        Notification::assertSentTo($user, ResetPassword::class, function ($notification) {
            $response = $this->get(
                route($this::ROUTE_GUEST_PASSWORD_RESET, ['token' => $notification->token])
            );

            $response->assertOk();

            return true;
        });
    }

    public function test_password_can_be_reset_with_valid_token()
    {
        Notification::fake();

        $user = User::factory()->create();

        $this->post(route($this::ROUTE_GUEST_PASSWORD_EMAIL), ['email' => $user->email]);

        Notification::assertSentTo($user, ResetPassword::class, function ($notification) use ($user) {
            $response = $this->post(route($this::ROUTE_GUEST_PASSWORD_UPDATE), [
                'token' => $notification->token,
                'email' => $user->email,
                'password' => 'password',
                'password_confirmation' => 'password',
            ]);

            $response->assertSessionHasNoErrors();

            return true;
        });
    }
}
