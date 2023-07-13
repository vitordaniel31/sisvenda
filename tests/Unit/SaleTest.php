<?php

use App\Models\User;
use App\Models\Sale;
use App\Models\Product;
use App\Models\ProductSale;
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

it('cancel a sales with permission (with products)', function () {
    $user = createUserForActing('sales.update');
    $sale = Sale::factory()->create();
    $product = Product::factory()->create();
    $sale->products()->create([
        'product_id' => $product->id,
        'quantity' => random_int(1, 100),
        'price' => $product->price,
    ]);

    if ($sale->status_id === Sale::STATUS_CANCELED['id']) {
        $this->actingAs($user)->put(route('sales.cancel', $sale))
            ->assertStatus(403);
    } else {
        $response = $this->actingAs($user)->put(route('sales.cancel', $sale))
            ->assertRedirect(route('sales.index'));

        $this->assertDatabaseHas('sales', [
            'id' => $sale->id,
            'status_id' => Sale::STATUS_CANCELED['id']
        ]);
    }
});

it('cancel a sales with permission (without products)', function () {
    $user = createUserForActing('sales.update');
    $sale = Sale::factory()->create();

    if ($sale->status_id === Sale::STATUS_CANCELED['id']) {
        $this->actingAs($user)->put(route('sales.cancel', $sale))
            ->assertStatus(403);
    } else {
        $response = $this->actingAs($user)->put(route('sales.cancel', $sale))
            ->assertRedirect(route('sales.index'));

        $this->assertEquals(0, Sale::count());
    }
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

it('test sales status nulled', function () {
    $sale = new Sale();
    $sale->status_id = 999;

    $this->assertNull($sale->status);
});

it('test sales creator relationship', function () {
    $sale = Sale::factory()->create();
    $user = User::find($sale->user_id);

    $this->assertEquals($sale->creator, $user);
});

it('save a product sale with permission (with sale)', function () {
    $user = createUserForActing('sales.update');

    $product = Product::factory()->create();
    $sale = Sale::factory()->create();

    if ($sale->status_id === Sale::STATUS_OPEN['id']) {
        $this->actingAs($user)->post(route('sales.products.save', $sale), [
            'product_id' => $product->id,
            'quantity' => 1,
        ])->assertRedirect(route('sales.edit', $sale));
    } else {
        $this->actingAs($user)->post(route('sales.products.save', $sale), [
            'product_id' => $product->id,
            'quantity' => 1,
        ])->assertStatus(403);
    }
});

it('save a product sale with permission (with sale and already exist sale product)', function () {
    $user = createUserForActing('sales.update');

    $product = Product::factory()->create();
    $sale = Sale::factory()->create();
    $sale->products()->create([
        'product_id' => $product->id,
        'quantity' => random_int(1, 100),
        'price' => $product->price,
    ]);

    if ($sale->status_id === Sale::STATUS_OPEN['id']) {
        $this->actingAs($user)->post(route('sales.products.save', $sale), [
            'product_id' => $product->id,
            'quantity' => 1,
        ])->assertRedirect(route('sales.edit', $sale));
    } else {
        $this->actingAs($user)->post(route('sales.products.save', $sale), [
            'product_id' => $product->id,
            'quantity' => 1,
        ])->assertStatus(403);
    }
});

it('save a product sale with permission (without sale)', function () {
    $user = createUserForActing('sales.create');

    $product = Product::factory()->create();

    $this->actingAs($user)->post(route('sales.products.save'), [
        'product_id' => $product->id,
        'quantity' => 1,
    ])->assertRedirect(route('sales.edit', Sale::latest('id')->first()));
});

it('save a product sale without permission', function () {
    $user = createUserForActing();

    $product = Product::factory()->create();
    $sale = Sale::factory()->create();

    $this->actingAs($user)->post(route('sales.products.save', $sale), [
        'product_id' => $product->id,
        'quantity' => 1,
    ])->assertStatus(403);
});

it('add a product sale with permission', function () {
    $user = createUserForActing('sales.update');

    $productSale = ProductSale::factory()->create();
    $sale = $productSale->sale;

    if ($sale->status_id === Sale::STATUS_OPEN['id']) {
        $this->actingAs($user)->put(
            route('sales.products.add', ['sale' => $sale, 'productSale' => $productSale])
        )->assertRedirect(route('sales.edit', $sale));
    } else {
        $this->actingAs($user)->put(
            route('sales.products.add', ['sale' => $sale, 'productSale' => $productSale])
        )->assertStatus(403);
    }
});

it('add a product sale without permission', function () {
    $user = createUserForActing();

    $productSale = ProductSale::factory()->create();
    $sale = $productSale->sale;

    $this->actingAs($user)->put(
        route('sales.products.add', ['sale' => $sale, 'productSale' => $productSale])
    )->assertStatus(403);
});

it('remove a product sale with permission', function () {
    $user = createUserForActing('sales.update');

    $productSale = ProductSale::factory()->create();
    $sale = $productSale->sale;

    if ($sale->status_id === Sale::STATUS_OPEN['id']) {
        $this->actingAs($user)->put(
            route('sales.products.remove', ['sale' => $sale, 'productSale' => $productSale])
        )->assertRedirect(route('sales.edit', $sale));
    } else {
        $this->actingAs($user)->put(
            route('sales.products.remove', ['sale' => $sale, 'productSale' => $productSale])
        )->assertStatus(403);
    }
});

it('remove a product sale without permission', function () {
    $user = createUserForActing();

    $productSale = ProductSale::factory()->create();
    $sale = $productSale->sale;

    $this->actingAs($user)->put(
        route('sales.products.remove', ['sale' => $sale, 'productSale' => $productSale])
    )->assertStatus(403);
});

it('delete a product sale with permission', function () {
    $user = createUserForActing('sales.delete');
    $productSale = ProductSale::factory()->create();

    $this->actingAs($user)->delete(route('sales.products.destroy', ['sale' => $productSale->sale, 'productSale' => $productSale]))
        ->assertRedirect(route('sales.edit', $productSale->sale));
});

it('delete a product sale without permission', function () {
    $user = createUserForActing();
    $productSale = ProductSale::factory()->create();

    $this->actingAs($user)->delete(route('sales.products.destroy', ['sale' => $productSale->sale, 'productSale' => $productSale]))
        ->assertStatus(403);
});
