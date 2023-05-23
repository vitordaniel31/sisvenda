<?php

use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(Tests\TestCase::class, RefreshDatabase::class);

it('list users with permission', function () {
    $user = User::factory()->create();
    $role = Role::firstOrCreate([
        'name' => 'Administrador',
        'guard_name' => '*'
    ]);

    $permission = Permission::firstOrCreate([
        'name' => 'users.create',
        'guard_name' => '*'
    ]);

    $user->syncPermissions($permission->id);
    $user->syncRoles($role->id);

    $this->actingAs($user)->get(route('users.create', User::factory()->create()))
        ->assertStatus(200);
});

it('list users without permission', function () {
    $user = User::factory()->create();

    $this->actingAs($user)->get(route('users.create', User::factory()->create()))
        ->assertStatus(403);
});
