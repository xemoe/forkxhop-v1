<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\{Str, Facades\Hash};
use Illuminate\Validation\{Rule, Rules};

class UsersController extends Controller
{
    /**
     * Display the users table view.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $request->validate([
            'order' => ['in:created_at,updated_at,name,email'],
            'sort' => ['in:asc,desc'],
        ]);

        $perPage = 3;
        $orderBy = request()->input('order', 'created_at');
        $sort = request()->input('sort', 'desc');
        $users = User::orderBy($orderBy, $sort)
            ->paginate($perPage)
            ->appends(['order' => $orderBy, 'sort' => $sort]);

        $breadcrumb = [
            ['name' => 'admin', 'route' => route('admin.users.index')],
            ['name' => 'users', 'route' => route('admin.users.index'), 'active' => 'active'],
        ];

        return view('domain.admin.users.index', compact(['breadcrumb', 'users', 'orderBy', 'sort']));
    }

    /**
     * Display the create user view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $breadcrumb = [
            ['name' => 'admin', 'route' => route('admin.users.index')],
            ['name' => 'users', 'route' => route('admin.users.index')],
            ['name' => 'create', 'route' => route('admin.users.create'), 'active' => 'active'],
        ];

        $roleOptions = [
            User::ROLE_ADMIN_USER,
            User::ROLE_SIMPLE_USER,
        ];

        return view('domain.admin.users.create', compact(['breadcrumb', 'roleOptions']));
    }

    /**
     * Handle create user request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => [
                Rule::in([User::ROLE_ADMIN_USER, User::ROLE_SIMPLE_USER])
            ],
            'active' => ['in:on']
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'active' => $request->active == 'on',
        ]);

        $user->syncRoles([$request->role]);

        return redirect()->route('admin.users.index')
            ->with('success', sprintf('User `%s` created successfully.', $user->name));
    }

    public function show(User $user)
    {
        $breadcrumb = [
            ['name' => 'admin', 'route' => route('admin.users.index')],
            ['name' => 'users', 'route' => route('admin.users.index')],
            ['name' => $user->name, 'route' => route('admin.users.show', ['user' => $user]), 'active' => 'active'],
        ];

        return view('domain.admin.users.show', compact(['breadcrumb', 'user']));
    }

    public function edit(User $user)
    {
        $breadcrumb = [
            ['name' => 'admin', 'route' => route('admin.users.index')],
            ['name' => 'users', 'route' => route('admin.users.index')],
            ['name' => $user->name, 'route' => route('admin.users.edit', ['user' => $user]), 'active' => 'active'],
        ];

        $roleOptions = [
            User::ROLE_ADMIN_USER,
            User::ROLE_SIMPLE_USER,
        ];

        return view('domain.admin.users.edit', compact(['breadcrumb', 'roleOptions', 'user']));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'update_form' => ['required', 'in:information,email,password'],
        ]);

        //
        // Default
        //
        $success = false;
        $roleChanged = false;
        $responseState = 'none';
        $responseMsg = sprintf('User `%s` nothing changes.', $user->name);

        switch ($request->update_form) {
            case 'information':
                //
                // Change only user information
                //
                $request->validate([
                    'name' => ['required', 'string', 'min:3', 'max:255'],
                    'role' => [
                        'required',
                        Rule::in([User::ROLE_ADMIN_USER, User::ROLE_SIMPLE_USER])
                    ],
                    'active' => ['in:on']
                ]);

                $success = $user->update([
                    'name' => $request->name,
                    'active' => $request->active == 'on',
                ]);

                //
                // Check role has changes
                //
                $oldRoles = $user->getRoleNames();
                $user->syncRoles([$request->role]);

                $roleChanged = $oldRoles->diff($user->getRoleNames())->count() > 0;

                break;
            case 'email':
                //
                // Change only user email
                //
                $request->validate([
                    'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
                ]);

                $success = $user->update([
                    'email' => $request->email,
                ]);
                break;
            case 'password':
                //
                // Change only user password
                //
                $request->validate([
                    'password' => ['required', 'confirmed', Rules\Password::defaults()],
                ]);

                $success = $user->update([
                    'password' => Hash::make($request->password),
                ]);
                break;
        }

        $changed = $roleChanged || $user->wasChanged();

        if ($success && $changed) {
            $responseState = 'success';
            $responseMsg = sprintf('User `%s` has been updated.', $user->name);
        } elseif (!$success) {
            $responseState = 'failed';
            $responseMsg = sprintf('User `%s` update failed.', $user->name);
        }

        return redirect()->route('admin.users.edit', ['user' => $user])
            ->with($responseState, $responseMsg);
    }

    public function destroy(Request $request, User $user)
    {
        $isDeleted = false;
        $request->validate([
            'confirm_delete' => ['required', 'in:on']
        ]);

        if ($request->confirm_delete == 'on') {
            $isDeleted = $user->delete();
        }

        if ($isDeleted) {
            $responseState = 'success';
            $responseMsg = sprintf('User `%s` has been deleted.', $user->name);
        } else {
            $responseState = 'failed';
            $responseMsg = sprintf('User `%s` delete failed.', $user->name);
        }

        return redirect()->route('admin.users.index')
            ->with($responseState, $responseMsg);
    }
}
