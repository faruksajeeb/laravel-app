<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # Create Role
        $roleSuperAdmin = Role::create(['name' => 'superadmin']);
        $roleAdmin = Role::create(['name' => 'admin']);
        $roleWriter = Role::create(['name' => 'writer']);
        $roleEditor = Role::create(['name' => 'editor']);
        $roleUser = Role::create(['name' => 'user']);


        # Permissions
        $permissions = [
            // Dashboard 
            [
                'group_name' => 'dashboard',
                'permissions' => [
                    'dashboard.view'
                ]
            ],
            // User 
            [
                'group_name' => 'user',
                'permissions' => [
                    'user.create',
                    'user.edit',
                    'user.view',
                    'user.delete'
                ]
            ],
            [
                // Role
                'group_name' => 'role',
                'permissions' => [
                    'role.create',
                    'role.edit',
                    'role.view',
                    'role.delete'
                ]
            ], [
                // Permission
                'group_name' => 'permission',
                'permissions' => [
                    'permission.create',
                    'permission.edit',
                    'permission.view',
                    'permission.delete',
                ]
            ], [
                // Profile
                'group_name' => 'profile',
                'permissions' => [
                    'profile.edit',
                    'profile.view'
                ]
            ]

        ];
        # Assign Permissins
        for ($i = 0; $i < count($permissions); $i++) {
            for ($j = 0; $j < count($permissions[$i]['permissions']); $j++) {
                $permission = Permission::create([
                    'group_name' => $permissions[$i]['group_name'],
                    'name' => $permissions[$i]['permissions'][$j]
                ]);
                $roleSuperAdmin->givePermissionTo($permission);
                $permission->assignRole($roleSuperAdmin);
            }            
        }
    }
}
