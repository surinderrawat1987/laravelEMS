<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    /**
     * Create the initial roles and permissions.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'add user']);
        Permission::create(['name' => 'edit user']);
        Permission::create(['name' => 'delete user']);

        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'staff']);
        $role2 = Role::create(['name' => 'superadmin']);
        
        $user = Factory(App\User::class)->create([
            'name' => 'Staff Tester',
            'email' => 'staff@test.com',
        ]);

        $user->assignRole($role1);

    }
}