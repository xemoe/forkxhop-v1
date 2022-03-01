<?php

namespace App\Services\Layouts;

use App\Models\User;

class HeaderSettings
{
    public function getUserHeader(User $user)
    {
        if ($user->isRootUser()) {
            return $this->getRootHeader($user);
        } elseif ($user->isAdminUser()) {
            return $this->getAdminHeader($user);
        } elseif ($user->isSimpleUser()) {
            return $this->getSimpleHeader($user);
        } else {
            abort(404);
        }
    }

    protected function getRootHeader(User $user)
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
                'email' => $user->email,
                'dropdown' => [
                    [
                        'group' => 'Settings',
                        'items' => [
                            ['name' => 'Profile', 'route' => route('me.user.profile'), 'icon' => 'cil-user'],
                            ['name' => 'Settings', 'route' => route('me.user.settings'), 'icon' => 'cil-settings'],
                        ],
                    ],
                ],
            ],
        ];
    }

    protected function getAdminHeader(User $user)
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
                'email' => $user->email,
                'dropdown' => [
                    [
                        'group' => 'Settings',
                        'items' => [
                            ['name' => 'Profile', 'route' => route('me.user.profile'), 'icon' => 'cil-user'],
                            ['name' => 'Settings', 'route' => route('me.user.settings'), 'icon' => 'cil-settings'],
                        ],
                    ],
                ],
            ],
        ];
    }

    protected function getSimpleHeader(User $user)
    {
        return [
            'quickMenu' => [
                'Dashboard' => route('dashboard.home'),
                'Settings' => route('dashboard.home'),
            ],
            'notificationsMenu' => [
                'cil-bell' => '#notifications',
                'cil-list-rich' => '#event-logs',
            ],
            'userMenu' => [
                'avatar' => url('assets/img/avatars/r0.jpg'),
                'email' => $user->email,
                'dropdown' => [
                    [
                        'group' => 'Settings',
                        'items' => [
                            ['name' => 'Profile', 'route' => route('me.user.profile'), 'icon' => 'cil-user'],
                            ['name' => 'Settings', 'route' => route('me.user.settings'), 'icon' => 'cil-settings'],
                        ],
                    ],
                ],
            ],
        ];
    }
}
