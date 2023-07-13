<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    private $roles = [
        [
            'name' => 'Administrador',
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
                'sales.read',
                'sales.create',
                'sales.update',
                'sales.delete',
                'pixes.read',
                'pixes.create',
                'pixes.update',
                'pixes.delete',
                'paymentMethods.read',
                'paymentMethods.create',
                'paymentMethods.update',
                'paymentMethods.delete',
                'reports.read',
                'reports.create',
                'reports.update',
                'reports.delete',
            ]
        ],
        [
            'name' => 'Gerente',
            'permissions' => [
                'users.read',
                'users.create',
                'roles.read',
                'roles.create',
                'roles.update',
                'roles.delete',
                'products.read',
                'products.create',
                'products.update',
                'products.delete',
                'sales.read',
                'sales.create',
                'sales.update',
                'sales.delete',
                'pixes.read',
                'pixes.create',
                'pixes.update',
                'pixes.delete',
                'paymentMethods.read',
                'paymentMethods.create',
                'paymentMethods.update',
                'paymentMethods.delete',
                'reports.read',
                'reports.create',
                'reports.update',
                'reports.delete',
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
