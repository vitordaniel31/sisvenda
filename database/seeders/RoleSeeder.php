<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    private $roles = [
        [
            'name' => 'Administrador Principal',
            'permissions' => [
                'users.read',
                'users.create',
                'users.update',
                'users.delete',
                'roles.read',
                'roles.create',
                'roles.update',
                'roles.delete',
                'products.read',
                'products.create',
                'products.update',
                'products.delete',
            ]
        ],
        [
            'name' => 'Administrador',
            'permissions' => [
                'users.read',
                'users.create',
                'users.update',
                'roles.read',
                'roles.create',
                'roles.update',
                'products.read',
                'products.create',
                'products.update',
                'products.delete',
            ]
        ],
    ];

    public function run()
    {
        foreach ($this->roles as $roleToCreate) {
            $role = Role::firstOrCreate([
                'name' => $roleToCreate['name'],
                'guard_name' => '*'
            ]);

            if (count($roleToCreate['permissions']) > 0) {
                $role->syncPermissions($roleToCreate['permissions']);
            }
        }
    }
}
