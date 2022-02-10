<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

//
// @TODO
// - [ ] Move $menuSettings to app/Services/Layouts/MenuSettings.php (LazyLoad)
// - [ ] Move $headerSettings to app/Services/Layouts/HeaderSettings.php (LazyLoad)
//
class UsersController extends Controller
{
    /**
     * Display the users table view.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $menuSettings = [
            ['name' => 'Dashboard', 'route' => route('dashboard.home'), 'icon' => 'cil-speedometer', 'badge' => 'New'],
            [
                'group' => 'Reports',
                'child' => [
                    ['name' => 'Monthly Reports', 'route' => '#monthly-reports', 'icon' => 'cil-grid'],
                    ['name' => 'Daily Reports', 'route' => '#daily-reports', 'icon' => 'cil-notes'],
                ],
            ],
            [
                'group' => 'Administrator',
                'icon' => 'cil-shield-alt',
                'child' => [
                    [
                        'group' => 'User Management',
                        'icon' => 'cil-user',
                        'child' => [
                            ['name' => 'Show users', 'route' => route('admin.users.index'), 'badge' => 'New'],
                            ['name' => 'Create user', 'route' => route('admin.users.create')],
                        ],
                    ],
                    ['name' => 'Application Logs', 'route' => '#application-logs', 'icon' => 'cil-columns'],
                    ['name' => 'Access Logs', 'route' => '#access-logs', 'icon' => 'cil-devices'],
                ],
            ],
        ];

        $headerSettings = [
            'quickMenu' => [
                'Dashboard' => route('dashboard.home'),
                'Users' => route('dashboard.home'),
                'Settings' => route('dashboard.home'),
            ],
            'notificationsMenu' => [
                'cil-bell' => '#notifications',
                'cil-list-rich' => '#event-logs',
            ],
            'userMenu' => [
                'avatar' => url('assets/img/avatars/r0.jpg'),
                'email' => 'me@example.com',
                'dropdown' => [
                    [
                        'group' => 'Settings',
                        'items' => [
                            ['name' => 'Profile', 'route' => '#user-profile', 'icon' => 'cil-user'],
                            ['name' => 'Settings', 'route' => '#user-settings', 'icon' => 'cil-settings'],
                        ],
                    ],
                ],
            ],
        ];

        $breadcrumb = [
            ['name' => 'admin', 'route' => route('admin.users.index')],
            ['name' => 'users', 'route' => route('admin.users.index'), 'active' => 'active'],
        ];

        $request->validate([
            'order' => ['in:id,name,email'],
            'sort' => ['in:asc,desc'],
        ]);

        $perPage = 3;
        $orderBy = request()->input('order', 'id');
        $sort = request()->input('sort', 'desc');
        $users = User::orderBy($orderBy, $sort)->paginate($perPage);

        $sortOptions = [
            ['order' => 'id', 'sort' => 'desc'],
            ['order' => 'id', 'sort' => 'asc'],
            ['order' => 'name', 'sort' => 'desc'],
            ['order' => 'name', 'sort' => 'asc'],
            ['order' => 'email', 'sort' => 'desc'],
            ['order' => 'email', 'sort' => 'asc'],
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
        $menuSettings = [
            ['name' => 'Dashboard', 'route' => route('dashboard.home'), 'icon' => 'cil-speedometer', 'badge' => 'New'],
            [
                'group' => 'Reports',
                'child' => [
                    ['name' => 'Monthly Reports', 'route' => '#monthly-reports', 'icon' => 'cil-grid'],
                    ['name' => 'Daily Reports', 'route' => '#daily-reports', 'icon' => 'cil-notes'],
                ],
            ],
            [
                'group' => 'Administrator',
                'icon' => 'cil-shield-alt',
                'child' => [
                    [
                        'group' => 'User Management',
                        'icon' => 'cil-user',
                        'child' => [
                            ['name' => 'Show users', 'route' => route('admin.users.index'), 'badge' => 'New'],
                            ['name' => 'Create user', 'route' => route('admin.users.create')],
                        ],
                    ],
                    ['name' => 'Application Logs', 'route' => '#application-logs', 'icon' => 'cil-columns'],
                    ['name' => 'Access Logs', 'route' => '#access-logs', 'icon' => 'cil-devices'],
                ],
            ],
        ];

        $headerSettings = [
            'quickMenu' => [
                'Dashboard' => route('dashboard.home'),
                'Users' => route('dashboard.home'),
                'Settings' => route('dashboard.home'),
            ],
            'notificationsMenu' => [
                'cil-bell' => '#notifications',
                'cil-list-rich' => '#event-logs',
            ],
            'userMenu' => [
                'avatar' => url('assets/img/avatars/r0.jpg'),
                'email' => 'me@example.com',
                'dropdown' => [
                    [
                        'group' => 'Settings',
                        'items' => [
                            ['name' => 'Profile', 'route' => '#user-profile', 'icon' => 'cil-user'],
                            ['name' => 'Settings', 'route' => '#user-settings', 'icon' => 'cil-settings'],
                        ],
                    ],
                ],
            ],
        ];

        $breadcrumb = [
            ['name' => 'admin', 'route' => route('admin.users.index')],
            ['name' => 'users', 'route' => route('admin.users.index')],
            ['name' => 'create', 'route' => route('admin.users.create'), 'active' => 'active'],
        ];

        $roles = [
            1 => 'Admin',
            2 => 'Simple',
            3 => 'None',
        ];

        return view(
            'domain.admin.users.create',
            compact(['menuSettings', 'headerSettings', 'breadcrumb', 'roles'])
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
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.users.index')
            ->with('success', sprintf('Users `%s` created successfully.', $user->name));
    }
}
