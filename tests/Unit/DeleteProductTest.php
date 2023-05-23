<?php

use App\Models\User;
use App\Models\Product;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(Tests\TestCase::class, RefreshDatabase::class);

it('delete a product with permission', function () {
    $product = Product::factory()->create();
    $user = User::factory()->create();
    $role = Role::firstOrCreate([
        'name' => 'Administrador',
        'guard_name' => '*'
    ]);

    $permission = Permission::firstOrCreate([
        'name' => 'products.delete',
        'guard_name' => '*'
    ]);

    $user->syncPermissions($permission->id);
    $user->syncRoles($role->id);

    

    $this->actingAs($user)->delete(route('products.destroy', $product))
        ->assertRedirect(route('products.index'));
});

it('delete a product without permission', function () {
    $user = User::factory()->create();
    $product = Product::factory()->create();

    $this->actingAs($user)->delete(route('products.destroy', $product))
        ->assertStatus(403);
});

