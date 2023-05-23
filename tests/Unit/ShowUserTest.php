<?php

use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(Tests\TestCase::class, RefreshDatabase::class);

it('show a user with permission', function () {
    $user = User::factory()->create();
    $role = Role::firstOrCreate([
        'name' => 'Administrador',
        'guard_name' => '*'
    ]);

    $permission = Permission::firstOrCreate([
        'name' => 'users.read',
        'guard_name' => '*'
    ]);

    $user->syncPermissions($permission->id);
    $user->syncRoles($role->id);

    $this->actingAs($user)->get(route('users.show', $user))
        ->assertStatus(200);
});

it('show a user without permission', function () {
    $user = User::factory()->create();

    $this->actingAs($user)->get(route('users.show', $user))
        ->assertStatus(403);
});

it('show a not found user', function () {
    $user = User::factory()->create();
    $role = Role::firstOrCreate([
        'name' => 'Administrador',
        'guard_name' => '*'
    ]);

    $permission = Permission::firstOrCreate([
        'name' => 'users.read',
        'guard_name' => '*'
    ]);

    $user->syncPermissions($permission->id);
    $user->syncRoles($role->id);

    $notFoundUserId = User::latest()->first()?->id + 100;

    $this->actingAs($user)->get(route('users.show', $notFoundUserId))
        ->assertStatus(404);
});
