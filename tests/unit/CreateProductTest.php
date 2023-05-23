<?php

use App\Models\User;
use App\Models\Product;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

uses(Tests\TestCase::class);

it('create a product with permission', function () {
    $user = User::factory()->create();
    $product = Product::factory()->create();
    $role = Role::firstOrCreate([
        'name' => 'Administrador',
        'guard_name' => '*'
    ]);

    $permission = Permission::firstOrCreate([
        'name' => 'products.create',
        'guard_name' => '*'
    ]);

    $user->syncPermissions($permission->id);
    $user->syncRoles($role->id);

    $newProduct = [
        'name' => "Conjunto 2", 
        'price' => "20"
    ];

    $this->actingAs($user)->post(route('products.store', $newProduct))
    ->assertRedirect(route('products.show', Product::latest()->first()));

});

it('create a product without permission', function () {
    $user = User::factory()->create();
    $product = Product::factory()->create();

    $this->actingAs($user)->post(route('products.store', $product))
        ->assertStatus(403);
});
