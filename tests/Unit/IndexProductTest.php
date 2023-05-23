<?php

use App\Models\User;
use App\Models\Product;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

uses(Tests\TestCase::class);

it('list products with permission', function () {
    $user = User::factory()->create();
    $role = Role::firstOrCreate([
        'name' => 'Administrador',
        'guard_name' => '*'
    ]);

    $permission = Permission::firstOrCreate([
        'name' => 'products.read',
        'guard_name' => '*'
    ]);

    $user->syncPermissions($permission->id);
    $user->syncRoles($role->id);
    
    $this->actingAs($user)->get(route('products.index'))
        ->assertStatus(200);
});

it('list products without permission', function () {
    $user = User::factory()->create();
    
    $this->actingAs($user)->get(route('products.index'))
        ->assertStatus(403);
});