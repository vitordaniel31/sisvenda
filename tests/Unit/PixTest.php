<?php

use App\Models\User;
use App\Models\Pix;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(Tests\TestCase::class, RefreshDatabase::class);

it('list pixes with permission', function () {
    $user = createUserForActing('pixes.read');

    $this->actingAs($user)->get(route('pixes.index'))
        ->assertStatus(200);
});

it('list pixes without permission', function () {
    $user = createUserForActing();

    $this->actingAs($user)->get(route('pixes.index'))
        ->assertStatus(403);
});

it('access pix create page with permission', function () {
    $user = createUserForActing('pixes.create');

    $this->actingAs($user)->get(route('pixes.create'))
        ->assertStatus(200);
});

it('access pix create page without permission', function () {
    $user = createUserForActing();

    $this->actingAs($user)->get(route('pixes.create'))
        ->assertStatus(403);
});

it('store a pix with permission', function () {
    $user = createUserForActing('pixes.create');

    $this->actingAs($user)
        ->post(route('pixes.store', [
            'name' => 'Pix Teste',
            'key' => '12345678900',
            'type_id' => 0
        ]))
        ->assertRedirect(route('pixes.show', Pix::latest('id')->first()));
});

it('store a pix without permission', function () {
    $user = createUserForActing();

    $this->actingAs($user)->post(route('pixes.store', [
        'name' => 'Pix Teste',
        'key' => '12345678900',
        'type_id' => 2
    ]))->assertStatus(403);
});

it('access pix edit page with permission', function () {
    $user = createUserForActing('pixes.update');

    $pix = Pix::factory()->create();

    $this->actingAs($user)->get(route('pixes.edit', $pix))
        ->assertStatus(200);
});

it('access pix edit page without permission', function () {
    $user = createUserForActing();

    $pix = Pix::factory()->create();

    $this->actingAs($user)->get(route('pixes.edit', $pix))
        ->assertStatus(403);
});

it('update a pix with permission', function () {
    $user = createUserForActing('pixes.update');

    $pix = Pix::factory()->create();

    $this->actingAs($user)->put(route('pixes.update', $pix), [
        'name' => 'Pix Teste2',
        'key' => '12345678800',
        'type_id' => 0
    ])->assertRedirect(route('pixes.show', $pix));
});

it('update a pix without permission', function () {
    $user = createUserForActing();
    $pix = Pix::factory()->create();

    $this->actingAs($user)->put(route('pixes.update', $pix), [
        'name' => 'Pix Teste3',
        'key' => 'a@gmail.com',
        'type_id' => 2
    ])->assertStatus(403);
});

it('show a pix with permission', function () {
    $user = createUserForActing('pixes.read');
    $pix = Pix::factory()->create();

    $this->actingAs($user)->get(route('pixes.show', $pix))
        ->assertStatus(200);
});

it('show a pix without permission', function () {
    $user = createUserForActing();
    $pix = Pix::factory()->create();

    $this->actingAs($user)->get(route('pixes.show', $pix))
        ->assertStatus(403);
});

it('show a not found pix', function () {
    $user = createUserForActing('pixes.read');
    $notFoundProductId = Pix::latest('id')->first()?->id + 100;

    $this->actingAs($user)->get(route('pixes.show', $notFoundProductId))
        ->assertStatus(404);
});

it('delete a pix with permission', function () {
    $user = createUserForActing('pixes.delete');
    $pix = Pix::factory()->create();

    $this->actingAs($user)->delete(route('pixes.destroy', $pix))
        ->assertRedirect(route('pixes.index'));
});

it('delete a pix without permission', function () {
    $user = createUserForActing();
    $pix = Pix::factory()->create();

    $this->actingAs($user)->delete(route('pixes.destroy', $pix))
        ->assertStatus(403);
});