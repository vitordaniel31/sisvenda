<?php

use App\Models\User;
use App\Models\Sale;
use App\Models\ProductSale;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(Tests\TestCase::class, RefreshDatabase::class);

it('calculates the total attribute correctly', function () {
    $product = Product::factory()->create(['price' => 10]);
    $sale = Sale::factory()->create();
    $productSale = ProductSale::factory()->create([
        'product_id' => $product->id,
        'sale_id' => $sale->id,
        'quantity' => 2,
        'price' => 10,
    ]);

    expect($productSale->total)->toBe(20);
});

it('belongs to a product', function () {
    $product = Product::factory()->create();
    $productSale = ProductSale::factory()->create(['product_id' => $product->id]);

    expect($productSale->product)->toBeInstanceOf(Product::class);
});

it('belongs to a sale', function () {
    $sale = Sale::factory()->create();
    $productSale = ProductSale::factory()->create(['sale_id' => $sale->id]);

    expect($productSale->sale)->toBeInstanceOf(Sale::class);
});
