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
        if ($sale) {
            $this->authorize('saveProduct', $sale);
        } else {
            $this->authorize('create', Sale::class);
        }

        if (!$sale) {
            $sale = Sale::create([
                'status_id' => Sale::STATUS_OPEN['id'],
                'user_id' => auth()->user()->id,
            ]);
        }

        $product = Product::findOrFail($request->product_id);

        $productSale = $sale->products()->where('product_id', $product->id)->first();
        if ($productSale) {
            $productSale->update([
                'quantity' => $productSale->quantity + $request->quantity
            ]);
        } else {
            $sale->products()->create(array_merge($request->validated(), [
                'price' => $product->price,
            ]));
        }

        return Redirect::route('sales.edit', $sale);
    }

    public function add(Sale $sale, ProductSale $productSale)
    {
        $this->authorize('saveProduct', $sale);
        
        $productSale->update([
            'quantity' => $productSale->quantity + 1,
        ]);

        return Redirect::route('sales.edit', $sale);
    }

    public function remove(Sale $sale, ProductSale $productSale)
    {
        $this->authorize('saveProduct', $sale);

        if ($productSale->quantity - 1 === 0) {
            $productSale->delete();

            session()->flash('alert', [
                'type' => 'success',
                'message' => 'O produto foi removido da venda com sucesso.'
            ]);
        } else {
            $productSale->update([
                'quantity' => $productSale->quantity - 1,
            ]);
        }

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
