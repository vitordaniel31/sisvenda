<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    private $permissions = [
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
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->permissions as $permissionToCreate) {
            Permission::firstOrCreate([
                'name' => $permissionToCreate,
                'guard_name' => '*'
            ]);
        }
    }
}
