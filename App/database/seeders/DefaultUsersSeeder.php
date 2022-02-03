<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class DefaultUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        //
        // create default users
        //
        $root = \App\Models\User::factory()->create([
            'name' => 'I am Root',
            'email' => 'root@example.com',
        ]);
        $root->syncRoles([$root::ROLE_ROOT_USER]);

        $admin = \App\Models\User::factory()->create([
            'name' => 'I am Admin',
            'email' => 'admin@example.com',
        ]);
        $admin->syncRoles([$admin::ROLE_ADMIN_USER]);

        $simple = \App\Models\User::factory()->create([
            'name' => 'I am Simple',
            'email' => 'simple@example.com',
        ]);
        $simple->syncRoles([$simple::ROLE_SIMPLE_USER]);
    }
}
