<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\Layouts\HeaderSettings;
use App\Services\Layouts\MenuSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rule;

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

        //
        // @TODO
        // - [ ] Change getAdminMenu to getMenu($user)
        // - [ ] Change getAdminHeader to getHeader($user)
        //
        $menuSettings = (new MenuSettings())->getAdminMenu();
        $headerSettings = (new HeaderSettings())->getAdminHeader();

        $breadcrumb = [
            ['name' => 'admin', 'route' => route('admin.users.index')],
            ['name' => 'users', 'route' => route('admin.users.index'), 'active' => 'active'],
        ];

        return view(
            'domain.admin.users.index',
            compact(['menuSettings', 'headerSettings', 'breadcrumb', 'users', 'sortOptions'])
        )->with('i', (request()->input('page', 1) - 1) * $perPage);
    }

    /**
     * Display the create user view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        //
        // @TODO
        // - [ ] Change getAdminMenu to getMenu($user)
        // - [ ] Change getAdminHeader to getHeader($user)
        //
        $menuSettings = (new MenuSettings())->getAdminMenu();
        $headerSettings = (new HeaderSettings())->getAdminHeader();

        $breadcrumb = [
            ['name' => 'admin', 'route' => route('admin.users.index')],
            ['name' => 'users', 'route' => route('admin.users.index')],
            ['name' => 'create', 'route' => route('admin.users.create'), 'active' => 'active'],
        ];

        $roleOptions = [
            User::ROLE_ADMIN_USER,
            User::ROLE_SIMPLE_USER,
        ];

        return view(
            'domain.admin.users.create',
            compact(['menuSettings', 'headerSettings', 'breadcrumb', 'roleOptions'])
        );
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
        //
        // @TODO
        // - [ ] Add create user with input `active` and check $user->active state
        //
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => [
                Rule::in([User::ROLE_ADMIN_USER, User::ROLE_SIMPLE_USER])
            ]
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->syncRoles([$request->role]);

        return redirect()->route('admin.users.index')
            ->with('success', sprintf('Users `%s` created successfully.', $user->name));
    }
}
