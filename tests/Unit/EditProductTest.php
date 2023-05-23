<?php

use App\Models\User;
use App\Models\Product;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(Tests\TestCase::class, RefreshDatabase::class);

it('edit a product with permission', function () {
    $user = User::factory()->create();
    $role = Role::firstOrCreate([
        'name' => 'Administrador',
        'guard_name' => '*'
    ]);

    $permission = Permission::firstOrCreate([
        'name' => 'products.update',
        'guard_name' => '*'
    ]);

    $user->syncPermissions($permission->id);
    $user->syncRoles($role->id);

    $product = Product::factory()->create();

    $this->actingAs($user)->put(route('products.update', $product), [
        'name' => "Novo nome",
        'price' => 20.0
    ])->assertRedirect(route('products.show', $product));
});

it('edit a product without permission', function () {
    $user = User::factory()->create();
    $product = Product::factory()->create();

    $this->actingAs($user)->put(route('products.update', $product), [
        'name' => "Novo nome",
        'price' => 20.0
    ])->assertStatus(403);
});
