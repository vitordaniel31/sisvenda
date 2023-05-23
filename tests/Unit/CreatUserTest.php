<?php

use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;


uses(Tests\TestCase::class, RefreshDatabase::class);

it('create users with permission', function () {
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

    $this->actingAs($user)
        ->post(route('users.store', [
        'name' => 'New User', 
        'email' => 'newUser@gmail.com', 
        'password' => 'password123', 
        'password_confirmation' => 
        'password123'
        ]))
        ->assertRedirect(route('users.show', User::latest()->skip(1)->take(1)->first()));
});
it('Create a user without permission', function () {
    $user = User::factory()->create();

    $this->actingAs($user)->post(route(
        'users.store',
        ['name' => 'New User', 
        'email' => 'newUser@gmail.com', 
        'password' => 'password123', 
        'password_confirmation' => 'password123'
        ]))
    ->assertStatus(403);
});


