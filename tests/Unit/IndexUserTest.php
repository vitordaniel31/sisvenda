<?php

use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

uses(Tests\TestCase::class);

it('list users with permission', function () {
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

    $this->actingAs($user)->get(route('users.index'))
        ->assertStatus(200);
});

it('list users without permission', function () {
    $user = User::factory()->create();

    $this->actingAs($user)->get(route('users.index'))
        ->assertStatus(403);
});
