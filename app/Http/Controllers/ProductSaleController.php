<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductSaleRequest;
use App\Models\Product;
use App\Models\ProductSale;
use App\Models\Sale;
use Illuminate\Support\Facades\Redirect;

class ProductSaleController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Sale::class);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateProductSaleRequest $request, Sale $sale)
    {
        $product = Product::findOrFail($request->product_id);

        $sale->products()->create(array_merge($request->validated(), [
            'price' => $product->price,
        ]));

        session()->flash('alert', [
            'type' => 'success',
            'message' => 'O produto foi inserido na venda com sucesso.'
        ]);

        return Redirect::route('sales.edit', $sale);
    }
}
