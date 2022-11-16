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
                    [
                        'name' => 'dashboard.view',
                        'is_menu' => 'no',
                        'menu_name' => ''
                    ]
                ]
            ],
            // User 
            [
                'group_name' => 'user',
                'permissions' => [
                    [
                        'name'=>'user.create',
                        'is_menu'=>'yes',
                        'menu_name' => 'Create User'
                    ],
                    [
                        'name'=>'user.edit',
                        'is_menu'=>'no',
                        'menu_name' => ''
                    ],
                    [
                        'name'=>'user.view',
                        'is_menu'=>'yes',
                        'menu_name' => 'Users'
                    ],
                    [
                        'name'=>'user.delete',
                        'is_menu'=>'no',
                        'menu_name' => ''
                    ],
                    [
                        'name'=>'user.import',
                        'is_menu'=>'no',
                        'menu_name' => ''
                    ],
                    [
                        'name'=>'user.export',
                        'is_menu'=>'no',
                        'menu_name' => ''
                    ]
                ]
            ],
            [
                // Role
                'group_name' => 'role',
                'permissions' => [
                    [
                        'name' => 'role.create',
                        'is_menu' => 'yes',
                        'menu_name' => 'Create Role'
                    ],
                    [
                        'name' => 'role.edit',
                        'is_menu' => 'no',
                        'menu_name' => ''
                    ],
                    [
                        'name' => 'role.view',
                        'is_menu' => 'no',
                        'menu_name' => 'Roles'
                    ],
                    [
                        'name' => 'role.delete',
                        'is_menu' => 'no',
                        'menu_name' => ''
                    ]
                ]
            ], [
                // Permission
                'group_name' => 'permission',
                'permissions' => [
                    [
                        'name'=> 'permission.create',
                        'is_menu' => 'yes',
                        'menu_name' => 'Create Permission'
                    ],
                    [
                        'name'=> 'permission.edit',
                        'is_menu' => 'no',
                        'menu_name' => ''
                    ],
                    [
                        'name'=> 'permission.view',
                        'is_menu' => 'yes',
                        'menu_name' => 'Permissions'
                    ],
                    [
                        'name'=> 'permission.delete',
                        'is_menu' => 'no',
                        'menu_name' => ''
                    ],
                ]
            ], [
                // Profile
                'group_name' => 'profile',
                'permissions' => [
                    [
                        'name' => 'profile.edit',
                        'is_menu' => 'no',
                        'menu_name' => ''
                    ],
                    [
                        'name' => 'profile.view',
                        'is_menu' => 'yes',
                        'menu_name' => ''
                    ]
                ]
            ]

        ];
        # Assign Permissins
        for ($i = 0; $i < count($permissions); $i++) {
            for ($j = 0; $j < count($permissions[$i]['permissions']); $j++) {
                $permission = Permission::create([
                    'group_name' => $permissions[$i]['group_name'],
                    'name' => $permissions[$i]['permissions'][$j]['name'],
                    'is_menu' => $permissions[$i]['permissions'][$j]['is_menu'],
                    'menu_name' => $permissions[$i]['permissions'][$j]['menu_name']                     
                ]);
                $roleSuperAdmin->givePermissionTo($permission);
                $permission->assignRole($roleSuperAdmin);
            }            
        }
    }
}
