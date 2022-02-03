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
        // find existing roles
        // - root
        // - admin
        // - simple
        //
        $roleRoot = Role::where(['name' => 'root'])->first();
        $roleAdmin = Role::where(['name' => 'admin'])->first();
        $roleSimpleUser = Role::where(['name' => 'simple'])->first();

        //
        // create default users
        //
        $root = \App\Models\User::factory()->create([
            'name' => 'I am Root',
            'email' => 'root@example.com',
        ]);
        $root->assignRole($roleRoot);

        $admin = \App\Models\User::factory()->create([
            'name' => 'I am Admin',
            'email' => 'admin@example.com',
        ]);
        $admin->assignRole($roleAdmin);

        $simple = \App\Models\User::factory()->create([
            'name' => 'I am Simple',
            'email' => 'simple@example.com',
        ]);
        $simple->assignRole($roleSimpleUser);
    }
}
