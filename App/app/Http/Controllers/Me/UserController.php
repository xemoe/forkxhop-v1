<?php

namespace App\Http\Controllers\Me;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\{Str, Facades\Hash};
use Illuminate\Validation\{Rule, Rules};

class UserController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $breadcrumb = [
            ['name' => 'me', 'route' => route('me.user.profile')],
            ['name' => 'profile', 'route' => route('me.user.profile'), 'active' => 'active'],
        ];

        $me = $request->user();

        return view(
            'domain.me.index',
            compact(['breadcrumb', 'me'])
        );
    }

    /**
     * @return \Illuminate\View\View
     */
    public function settings(Request $request)
    {
        $breadcrumb = [
            ['name' => 'me', 'route' => route('me.user.profile')],
            ['name' => 'settings', 'route' => route('me.user.settings'), 'active' => 'active'],
        ];

        $me = $request->user();

        return view(
            'domain.me.settings',
            compact(['breadcrumb', 'me'])
        );
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateSettings(Request $request)
    {
        $me = $request->user();

        //
        // Default
        //
        $success = false;
        $responseState = 'none';
        $responseMsg = sprintf('User `%s` nothing changes.', $me->name);

        $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $me->id],
        ]);

        $success = $me->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        $changed = $me->wasChanged();

        if ($success && $changed) {
            $responseState = 'success';
            $responseMsg = sprintf('User `%s` has been updated.', $me->name);
        } elseif (!$success) {
            $responseState = 'failed';
            $responseMsg = sprintf('User `%s` update failed.', $me->name);
        }

        return redirect()->route('me.user.settings')
            ->with($responseState, $responseMsg);
    }

    /**
     * @return \Illuminate\View\View
     */
    public function password(Request $request)
    {
        $breadcrumb = [
            ['name' => 'me', 'route' => route('me.user.profile')],
            ['name' => 'password', 'route' => route('me.user.password'), 'active' => 'active'],
        ];

        $me = $request->user();

        return view(
            'domain.me.change_password',
            compact(['breadcrumb', 'me'])
        );
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updatePassword(Request $request)
    {
        $me = $request->user();

        //
        // Default
        //
        $success = false;
        $responseState = 'none';
        $responseMsg = sprintf('User `%s` nothing changes.', $me->name);

        $request->validate([
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $success = $me->update([
            'password' => Hash::make($request->password),
        ]);

        $changed = $me->wasChanged();

        if ($success && $changed) {
            $responseState = 'success';
            $responseMsg = sprintf('User `%s` password has been updated.', $me->name);
        } elseif (!$success) {
            $responseState = 'failed';
            $responseMsg = sprintf('User `%s` password update failed.', $me->name);
        }

        return redirect()->route('me.user.password')
            ->with($responseState, $responseMsg);
    }
}
