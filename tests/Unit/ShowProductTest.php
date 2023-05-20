<?php

use App\Models\Product;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

uses(Tests\TestCase::class);

it('show a product with permission', function () {
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

    $product = Product::factory()->create();

    $this->actingAs($user)->get(route('products.show', $product))
        ->assertStatus(200);
});

it('show a product without permission', function () {
    $user = User::factory()->create();

    $product = Product::factory()->create();

    $this->actingAs($user)->get(route('products.show', $product))
        ->assertStatus(403);
});

it('show a not found product', function () {
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

    $notFoundProductId = Product::latest()->first()->id + 100;

    $this->actingAs($user)->get(route('products.show', $notFoundProductId))
        ->assertStatus(404);
});
