<?php

namespace Database\Seeders;

use App\Models\Contracts\WithRolesName;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class DefaultRolesAndPermissionsSeeder extends Seeder implements WithRolesName
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

        // create permissions
        Permission::create(['name' => 'view users']);
        Permission::create(['name' => 'create user']);
        Permission::create(['name' => 'edit user']);
        Permission::create(['name' => 'delete user']);

        //
        // create roles and assign existing permissions
        // - root
        // - admin
        // - simple
        //
        Role::create(['name' => $this::ROLE_ROOT_USER]);

        $roleAdmin = Role::create(['name' => $this::ROLE_ADMIN_USER]);
        $roleAdmin->givePermissionTo('view users');
        $roleAdmin->givePermissionTo('create user');
        $roleAdmin->givePermissionTo('edit user');
        $roleAdmin->givePermissionTo('delete user');

        Role::create(['name' => $this::ROLE_SIMPLE_USER]);
    }
}
