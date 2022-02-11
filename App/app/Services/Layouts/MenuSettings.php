<?php

namespace App\Services\Layouts;

class MenuSettings
{
    //
    // @TODO
    // - [ ] Add getMenu(User $user) and return from user role
    //
    public function getRootMenu()
    {
        return [
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
    }

    public function getAdminMenu()
    {
        return [
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
    }

    public function getSimpleMenu()
    {
        return [
            ['name' => 'Dashboard', 'route' => route('dashboard.home'), 'icon' => 'cil-speedometer', 'badge' => 'New'],
            [
                'group' => 'Reports',
                'child' => [
                    ['name' => 'Monthly Reports', 'route' => '#monthly-reports', 'icon' => 'cil-grid'],
                    ['name' => 'Daily Reports', 'route' => '#daily-reports', 'icon' => 'cil-notes'],
                ],
            ]
        ];
    }
}
