<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Role;

uses(Tests\TestCase::class, RefreshDatabase::class);

it('list users with permission', function () {
    $user = createUserForActing('users.read');

    $this->actingAs($user)->get(route('users.index'))
        ->assertStatus(200);
});

it('list users without permission', function () {
    $user = createUserForActing();

    $this->actingAs($user)->get(route('users.index'))
        ->assertStatus(403);
});

it('access user create page with permission', function () {
    $user = createUserForActing('users.create');

    $this->actingAs($user)->get(route('users.create'))
        ->assertStatus(200);
});

it('access user create page without permission', function () {
    $user = createUserForActing();

    $this->actingAs($user)->get(route('users.create'))
        ->assertStatus(403);
});

it('store a user with permission', function () {
    $user = createUserForActing('users.create');

    $this->actingAs($user)
        ->post(route('users.store'), [
            'name' => 'New User',
            'email' => 'newUser@gmail.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
            'role_id' => Role::inRandomOrder()->first()?->id,
        ])->assertRedirect(route('users.show', User::latest('id')->first()));
});

it('store a user without permission', function () {
    $user = createUserForActing();

    $this->actingAs($user)->post(
        route('users.store'),
        [
            'name' => 'New User',
            'email' => 'newUser@gmail.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
            'role_id' => Role::inRandomOrder()->first()?->id,
        ]
    )->assertStatus(403);
});

it('show a user with permission', function () {
    $user = createUserForActing('users.read');

    $this->actingAs($user)->get(route('users.show', $user))
        ->assertStatus(200);
});

it('show a user without permission', function () {
    $user = createUserForActing();

    $this->actingAs($user)->get(route('users.show', $user))
        ->assertStatus(403);
});

it('show a not found user', function () {
    $user = createUserForActing('users.read');

    $notFoundUserId = User::latest('id')->first()?->id + 100;

    $this->actingAs($user)->get(route('users.show', $notFoundUserId))
        ->assertStatus(404);
});

it('access user edit page with permission', function () {
    $user = createUserForActing('users.update');

    $this->actingAs($user)->get(route('users.edit', $user))
        ->assertStatus(200);
});

it('access user edit page without permission', function () {
    $user = createUserForActing();

    $this->actingAs($user)->get(route('users.edit', $user))
        ->assertStatus(403);
});

it('update a user with permission', function () {
    $user = createUserForActing('users.update');

    $this->actingAs($user)->put(route('users.update', $user), [
        'name' => "Testando Editar Usuário",
        'email' => "usuario_testado@gmail.com",
        'password' => '10203040',
        'password_confirmation' => '10203040',
        'role_id' => Role::inRandomOrder()->first()?->id,
    ])->assertRedirect(route('users.show', $user));
});

it('update a user without permission', function () {
    $user = createUserForActing();

    $this->actingAs($user)->put(route('users.update', $user), [
        'name' => "Testando Editar Usuário",
        'email' => "usuario_testado@gmail.com",
        'role_id' => Role::inRandomOrder()->first()?->id,
    ])->assertStatus(403);
});

it('delete a user with permission', function () {
    $user = createUserForActing('users.delete');

    $this->actingAs($user)->delete(route('users.destroy', $user))
        ->assertRedirect(route('users.index'));
});

it('delete a user without permission', function () {
    $user = createUserForActing();

    $this->actingAs($user)->delete(route('users.destroy', $user))
        ->assertStatus(403);
});
