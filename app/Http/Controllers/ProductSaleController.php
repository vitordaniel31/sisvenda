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
    public function save(CreateProductSaleRequest $request, Sale $sale = null)
    {
        if (!$sale) {
            $sale = Sale::create([
                'status_id' => Sale::STATUS_OPEN['id'],
                'user_id' => auth()->user()->id,
            ]);
        }

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

    public function add(Sale $sale, ProductSale $productSale)
    {
        $productSale->update([
            'quantity' => $productSale->quantity + 1,
        ]);

        return Redirect::route('sales.edit', $sale);
    }

    public function remove(Sale $sale, ProductSale $productSale)
    {
        $productSale->update([
            'quantity' => $productSale->quantity - 1,
        ]);

        return Redirect::route('sales.edit', $sale);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sale $sale, ProductSale $productSale)
    {
        $productSale->delete();

        session()->flash('alert', [
            'type' => 'success',
            'message' => 'O produto foi removido da venda com sucesso.'
        ]);

        return Redirect::route('sales.edit', $sale);
    }
}
