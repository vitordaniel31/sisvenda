<?php

use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(Tests\TestCase::class, RefreshDatabase::class);

it('edit a user with permission', function () {
    $user = User::factory()->create();
    $role = Role::firstOrCreate([
        'name' => 'Administrador',
        'guard_name' => '*'
    ]);

    $permission = Permission::firstOrCreate([
        'name' => 'users.update',
        'guard_name' => '*'
    ]);

    $user->syncPermissions($permission->id);
    $user->syncRoles($role->id);

    $this->actingAs($user)->put(route('users.update', $user),
        [
            'name' => "Testando Usuário",
            'email' => "usuario_testado@gmail.com"
        ])
        ->assertRedirect(route('users.show', $user));
});

it('edit a user without permission', function () {
    $user = User::factory()->create();

    $this->actingAs($user)->put(route('users.update', $user))
        ->assertStatus(403);
});