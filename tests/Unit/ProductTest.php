<?php

use App\Models\User;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(Tests\TestCase::class, RefreshDatabase::class);

it('list products with permission', function () {
    $user = createUserForActing('products.read');

    $this->actingAs($user)->get(route('products.index'))
        ->assertStatus(200);
});

it('list products without permission', function () {
    $user = createUserForActing();

    $this->actingAs($user)->get(route('products.index'))
        ->assertStatus(403);
});

it('access product create page with permission', function () {
    $user = createUserForActing('products.create');

    $this->actingAs($user)->get(route('products.create'))
        ->assertStatus(200);
});

it('access product create page without permission', function () {
    $user = createUserForActing();

    $this->actingAs($user)->get(route('products.create'))
        ->assertStatus(403);
});

it('store a product with permission', function () {
    $user = createUserForActing('products.create');

    $this->actingAs($user)
        ->post(route('products.store', [
            'name' => 'Produto Teste',
            'price' => 10.00
        ]))
        ->assertRedirect(route('products.show', Product::latest('id')->first()));
});

it('store a product without permission', function () {
    $user = createUserForActing();

    $this->actingAs($user)->post(route('products.store', [
        'name' => 'Produto Teste',
        'price' => 10.00
    ]))->assertStatus(403);
});

it('access product edit page with permission', function () {
    $user = createUserForActing('products.update');

    $product = Product::factory()->create();

    $this->actingAs($user)->get(route('products.edit', $product))
        ->assertStatus(200);
});

it('access product edit page without permission', function () {
    $user = createUserForActing();

    $product = Product::factory()->create();

    $this->actingAs($user)->get(route('products.edit', $product))
        ->assertStatus(403);
});

it('update a product with permission', function () {
    $user = createUserForActing('products.update');

    $product = Product::factory()->create();

    $this->actingAs($user)->put(route('products.update', $product), [
        'name' => "Novo nome",
        'price' => 20.0
    ])->assertRedirect(route('products.show', $product));
});

it('update a product without permission', function () {
    $user = createUserForActing();
    $product = Product::factory()->create();

    $this->actingAs($user)->put(route('products.update', $product), [
        'name' => "Novo nome",
        'price' => 20.0
    ])->assertStatus(403);
});

it('show a product with permission', function () {
    $user = createUserForActing('products.read');
    $product = Product::factory()->create();

    $this->actingAs($user)->get(route('products.show', $product))
        ->assertStatus(200);
});

it('show a product without permission', function () {
    $user = createUserForActing();
    $product = Product::factory()->create();

    $this->actingAs($user)->get(route('products.show', $product))
        ->assertStatus(403);
});

it('show a not found product', function () {
    $user = createUserForActing('products.read');
    $notFoundProductId = Product::latest('id')->first()?->id + 100;

    $this->actingAs($user)->get(route('products.show', $notFoundProductId))
        ->assertStatus(404);
});

it('delete a product with permission', function () {
    $user = createUserForActing('products.delete');
    $product = Product::factory()->create();

    $this->actingAs($user)->delete(route('products.destroy', $product))
        ->assertRedirect(route('products.index'));
});

it('delete a product without permission', function () {
    $user = createUserForActing();
    $product = Product::factory()->create();

    $this->actingAs($user)->delete(route('products.destroy', $product))
        ->assertStatus(403);
});
