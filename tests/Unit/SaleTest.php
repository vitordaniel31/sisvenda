<?php

use App\Models\Sale;
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

it('access sale create page with permission', function () {
    $user = createUserForActing('sales.create');

    $this->actingAs($user)->get(route('sales.create'))
        ->assertStatus(200);
});

it('access sale create page without permission', function () {
    $user = createUserForActing();

    $this->actingAs($user)->get(route('sales.create'))
        ->assertStatus(403);
});

it('store a sale with permission', function () {
    $user = createUserForActing('sales.create');

    $this->actingAs($user)
        ->post(route('sales.store', [
            'client' => 'Cliente Teste',
        ]))
        ->assertRedirect(route('sales.show', Sale::latest('id')->first()));
});

it('store a sale without permission', function () {
    $user = createUserForActing();

    $this->actingAs($user)->post(route('sales.store', [
        'client' => 'Cliente Teste',
    ]))->assertStatus(403);
});

it('show a sale with permission', function () {
    $user = createUserForActing('sales.read');
    $sale = Sale::factory()->create();

    $this->actingAs($user)->get(route('sales.show', $sale))
        ->assertStatus(200);
});

it('show a sale without permission', function () {
    $user = createUserForActing();
    $sale = Sale::factory()->create();

    $this->actingAs($user)->get(route('sales.show', $sale))
        ->assertStatus(403);
});

it('show a not found sale', function () {
    $user = createUserForActing('sales.read');
    $notFoundSaleId = Sale::latest('id')->first()?->id + 100;

    $this->actingAs($user)->get(route('sales.show', $notFoundSaleId))
        ->assertStatus(404);
});

it('test sale status open', function () {
    $sale = new Sale();
    $sale->status_id = 0;

    $this->assertEquals(Sale::STATUS_OPEN, $sale->status);
});

it('test sale status finished', function () {
    $sale = new Sale();
    $sale->status_id = 1;

    $this->assertEquals(Sale::STATUS_FINISHED, $sale->status);
});

it('test sale status canceled', function () {
    $sale = new Sale();
    $sale->status_id = 2;

    $this->assertEquals(Sale::STATUS_CANCELED, $sale->status);
});

it('test sale status nulled', function () {
    $sale = new Sale();
    $sale->status_id = 999;

    $this->assertNull($sale->status);
});
