<?php

namespace App\Services\Layouts;

use App\Models\User;

class MenuSettings
{
    public function getUserMenu(User $user)
    {
        if ($user->isRootUser()) {
            return $this->getRootMenu($user);
        } elseif ($user->isAdminUser()) {
            return $this->getAdminMenu($user);
        } elseif ($user->isSimpleUser()) {
            return $this->getSimpleMenu($user);
        } else {
            abort(404);
        }
    }

    protected function getRootMenu(User $user)
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

    protected function getAdminMenu(User $user)
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

    protected function getSimpleMenu(User $user)
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
