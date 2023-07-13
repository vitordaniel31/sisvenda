<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSaleRequest;
use App\Models\PaymentMethod;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class SaleController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Sale::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sales = Sale::all();

        // @codeCoverageIgnoreStart
        $sales = collect($sales)->map(function ($sale) {
            $sale['canUpdate'] = auth()->user()->can('update', $sale);
            $sale['canDelete'] = auth()->user()->can('delete', $sale);
            return $sale;
        }, $sales);
        // @codeCoverageIgnoreEnd

        return Inertia::render('Sales/Index', [
            'sales' => $sales
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // @codeCoverageIgnoreStart
        $products = Product::all()->map(function ($product) {
            $product->label = "{$product->name} - R$" . number_format($product->price, 2, ',', '.');

            return $product;
        });
        // @codeCoverageIgnoreEnd

        return Inertia::render('Sales/Create', [
            'products' => $products,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateSaleRequest $request)
    {
        $sale = Sale::create(array_merge($request->validated(), [
            'status_id' => Sale::STATUS_OPEN['id'],
            'user_id' => auth()->user()->id,
        ]));

        return Redirect::route('sales.edit', $sale);
    }

    /**
     * Display the specified resource.
     */
    public function show(Sale $sale)
    {
        $sale['canUpdate'] = auth()->user()->can('update', $sale);
        $sale['canDelete'] = auth()->user()->can('delete', $sale);

        $sale->load('products.product');
        $sale->load('bill.paymentMethods.pix');

        return Inertia::render('Sales/Show', [
            'sale' => $sale
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sale $sale)
    {
        $sale['canUpdate'] = auth()->user()->can('update', $sale);
        $sale['canDelete'] = auth()->user()->can('delete', $sale);

        $sale->load('products.product');
        $sale->load('bill.paymentMethods.pix');

        // @codeCoverageIgnoreStart
        $products = Product::all()->map(function ($product) {
            $product->label = "{$product->name} - R$" . number_format($product->price, 2, ',', '.');

            return $product;
        });

        $paymentMethods = PaymentMethod::all()->map(function ($paymentMethod) {
            if ($paymentMethod->name_id === PaymentMethod::NAME_PIX['id']) {
                $paymentMethod->label = $paymentMethod->name['label'] . " - Chave: " . $paymentMethod->pix->key . " / " . $paymentMethod->pix->name;
            } else {
                $paymentMethod->label = $paymentMethod->name['label'] . ($paymentMethod->notes ? " ({$paymentMethod->notes})" : '');
            }

            return $paymentMethod;
        });
        // @codeCoverageIgnoreEnd

        return Inertia::render('Sales/Edit', [
            'sale' => $sale,
            'products' => $products,
            'paymentMethods' => $paymentMethods,
        ]);
    }

    /**
     * Finish the specified resource in storage.
     */
    // @codeCoverageIgnoreStart
    public function finish(Sale $sale)
    {
        $this->authorize('finish', $sale);

        $sale->update([
            'status_id' => Sale::STATUS_FINISHED['id']
        ]);

        session()->flash('alert', [
            'type' => 'success',
            'message' => 'A venda foi finalizada com sucesso.'
        ]);

        return Redirect::route('sales.index');
    }


    /**
     * Cancel the specified resource in storage.
     */
    public function cancel(Sale $sale)
    {
        $this->authorize('cancel', $sale);

        if ($sale->products()->count() > 0) {
            $sale->update([
                'status_id' => Sale::STATUS_CANCELED['id']
            ]);
        } else {
            $sale->delete();
        }

        session()->flash('alert', [
            'type' => 'success',
            'message' => 'A venda foi cancelada com sucesso.'
        ]);

        return Redirect::route('sales.index');
    }
    // @codeCoverageIgnoreEnd

}
