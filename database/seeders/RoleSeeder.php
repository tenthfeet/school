<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $roles = [
            'super-admin',
            'admin',
            'user',
        ];
        foreach ($roles as $role) {
            Role::create([
                'name' => $role,
                'guard_name' => 'web',
            ]);
        }

        $superAdminWeb = Role::where(['name' => 'super-admin', 'guard_name' => 'web'])->firstOrFail();
        $superAdminWeb->givePermissionTo(Permission::where('guard_name', 'web')->get());

        $adminWeb = Role::where(['name' => 'admin', 'guard_name' => 'web'])->firstOrFail();
        $adminWeb->givePermissionTo([
            // user
            'user index',
            'user create',
            'user update',
            'user delete',
            'user show',
            // role
            'role index',
            'role update',
            'role show',
            // permission
            'permission index',
            'permission update',
            'permission show',
            // menu
            'menu users_list',
            'menu role_permission',
            'menu role_permission_permissions',
            'menu role_permission_roles',
        ]);

        $userWeb = Role::where(['name' => 'user', 'guard_name' => 'web'])->firstOrFail();
        $userWeb->givePermissionTo([
            // user
            'user index',
            'user update',
            'user show',
            //menu
            'menu users_list',
        ]);
    }
}