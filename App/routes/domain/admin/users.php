<?php

use Illuminate\Support\Facades\Route;

//
// Domain admin.users.*
// - index
// - create
//
Route::get('/admin/users', function () {

    //
    // @TODO
    // - [ ] Create App/Http/Controllers/Admin/UsersController.php
    // - [ ] Move variables ['menuSettings', 'headerSettings', 'breadcrumb'] to UsersController
    //
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

    return view(
        'domain.admin.users.index',
        compact(['menuSettings', 'headerSettings', 'breadcrumb'])
    );

})->middleware(['auth', 'role:root|admin',])
    ->name('admin.users.index');

Route::get('/admin/users/create', function () {

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

    return view(
        'domain.admin.users.create',
        compact(['menuSettings', 'headerSettings', 'breadcrumb'])
    );

})->middleware(['auth', 'role:root|admin',])
    ->name('admin.users.create');
