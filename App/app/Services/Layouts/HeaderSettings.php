<?php

namespace App\Services\Layouts;

class HeaderSettings
{
    //
    // @TODO
    // - [ ] Add getHeader(User $user) and return from user role
    //
    public function getRootHeader()
    {
        return [
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
    }

    public function getAdminHeader()
    {
        return [
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
    }

    public function getSimpleHeader()
    {
        return [
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
    }
}
