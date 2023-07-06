<?php

use App\Models\User;
use App\Models\Sale;
use App\Models\ProductSale;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(Tests\TestCase::class, RefreshDatabase::class);

it('list sales with permission', function () {
    $user = createUserForActing('sales.read');

    $this->actingAs($user)->get(route('sales.index'))
        ->assertStatus(200);
});

it('list sales without permission', function () {
    $user = createUserForActing();

    $this->actingAs($user)->get(route('sales.index'))
        ->assertStatus(403);
});

it('access sales create page with permission', function () {
    $user = createUserForActing('sales.create');

    $this->actingAs($user)->get(route('sales.create'))
        ->assertStatus(200);
});

it('access sales create page without permission', function () {
    $user = createUserForActing();

    $this->actingAs($user)->get(route('sales.create'))
        ->assertStatus(403);
});

it('store a sales with permission', function () {
    $user = createUserForActing('sales.create');

    $this->actingAs($user)
        ->post(route('sales.store', [
            'client' => 'Venda Teste',
            'status_id' => 0,
            'user_id' => 1
        ]))
        ->assertRedirect(route('sales.edit', Sale::latest('id')->first()));
});

it('store a sales without permission', function () {
    $user = createUserForActing();

    $this->actingAs($user)->post(route('sales.store', [
        'client' => 'Venda Teste 2',
        'status_id' => 1,
        'user_id' => 1
    ]))->assertStatus(403);
});

it('access sales edit page with permission', function () {
    $user = createUserForActing('sales.update');

    $sale = Sale::factory()->create();

    $this->actingAs($user)->get(route('sales.edit', $sale))
        ->assertStatus(200);
});

it('access sales edit page without permission', function () {
    $user = createUserForActing();

    $sale = Sale::factory()->create();

    $this->actingAs($user)->get(route('sales.edit', $sale))
        ->assertStatus(403);
});

it('update a sales with permission', function () {
    $user = createUserForActing('sales.update');
    $sale = Sale::factory()->create();

    $this->actingAs($user)->get(route('sales.edit', $sale), [
        'client' => 'Venda Editada Teste',
        'status_id' => 2,
        'user_id' => 1
    ])->assertStatus(200);
});

it('update a sales without permission', function () {
    $user = createUserForActing();
    $sale = Sale::factory()->create();

    $this->actingAs($user)->get(route('sales.edit', $sale), [
        'client' => 'Venda Editada Teste',
        'status_id' => 2,
        'user_id' => 1
    ])->assertStatus(403);
});

it('show a sales with permission', function () {
    $user = createUserForActing('sales.read');
    $sale = Sale::factory()->create();

    $this->actingAs($user)->get(route('sales.show', $sale))
        ->assertStatus(200);
});

it('show a sales without permission', function () {
    $user = createUserForActing();
    $sale = Sale::factory()->create();

    $this->actingAs($user)->get(route('sales.show', $sale))
        ->assertStatus(403);
});

it('show a not found sales', function () {
    $user = createUserForActing('sales.read');
    $notFoundProductId = Sale::latest('id')->first()?->id + 100;

    $this->actingAs($user)->get(route('sales.show', $notFoundProductId))
        ->assertStatus(404);
});

it('cancel a sales with permission', function () {
    $user = createUserForActing('sales.update');
    $sale = Sale::factory()->create();

    $this->actingAs($user)->put(route('sales.cancel', $sale))
        ->assertRedirect(route('sales.index'));
});

it('cancel a sales without permission', function () {
    $user = createUserForActing();
    $sale = Sale::factory()->create();

    $this->actingAs($user)->put(route('sales.cancel', $sale))
        ->assertStatus(403);
});

it('test sales status open', function () {
    $sale = new Sale();
    $sale->status_id = 0;

    $this->assertEquals(Sale::STATUS_OPEN, $sale->status);
});

it('test sales status finished', function () {
    $sale = new Sale();
    $sale->status_id = 1;

    $this->assertEquals(Sale::STATUS_FINISHED, $sale->status);
});

it('test sales status canceled', function () {
    $sale = new Sale();
    $sale->status_id = 2;

    $this->assertEquals(Sale::STATUS_CANCELED, $sale->status);
});

it('save a product sales with permission', function () {
    $user = createUserForActing('sales.update');

    $product = Product::factory()->create();
    $sale = Sale::factory()->create();

    $this->actingAs($user)->post(route('sales.products.save', $sale), [
        'product_id' => $product->id,
        'sale_id' => $sale->id,
        'quantity' => 1,
        'price' => 100,
    ])->assertRedirect(route('sales.edit', $sale));
});

it('save a product sale without permission', function () {
    $user = createUserForActing();

    $product = Product::factory()->create();
    $sale = Sale::factory()->create();

    $this->actingAs($user)->post(route('sales.products.save', $sale), [
        'product_id' => $product->id,
        'sale_id' => $sale->id,
        'quantity' => 1,
        'price' => 100,
    ])->assertStatus(403);
});