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
            'order' => ['in:id,name,email'],
            'sort' => ['in:asc,desc'],
        ]);

        $perPage = 3;
        $orderBy = request()->input('order', 'id');
        $sort = request()->input('sort', 'desc');
        $users = User::orderBy($orderBy, $sort)
            ->paginate($perPage)
            ->appends(['order' => $orderBy, 'sort' => $sort]);

        $sortOptions = [
            ['order' => 'id', 'sort' => 'desc'],
            ['order' => 'id', 'sort' => 'asc'],
            ['order' => 'name', 'sort' => 'desc'],
            ['order' => 'name', 'sort' => 'asc'],
            ['order' => 'email', 'sort' => 'desc'],
            ['order' => 'email', 'sort' => 'asc'],
        ];

        $breadcrumb = [
            ['name' => 'admin', 'route' => route('admin.users.index')],
            ['name' => 'users', 'route' => route('admin.users.index'), 'active' => 'active'],
        ];

        return view('domain.admin.users.index', compact(['breadcrumb', 'users', 'sortOptions']));
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
            'name' => ['required', 'string', 'max:255'],
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
            ->with('success', sprintf('Users `%s` created successfully.', $user->name));
    }

    public function show(User $user)
    {
        $breadcrumb = [
            ['name' => 'admin', 'route' => route('admin.users.index')],
            ['name' => 'users', 'route' => route('admin.users.index')],
            ['name' => $user->email, 'route' => route('admin.users.show', ['user' => $user]), 'active' => 'active'],
        ];

        return view('domain.admin.users.show', compact(['breadcrumb', 'user']));
    }
}
