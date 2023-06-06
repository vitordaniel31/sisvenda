<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Product::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();

        // @codeCoverageIgnoreStart
        $products = collect($products)->map(function ($product) {
            $product['can_update'] = auth()->user()->can('update', $product);
            $product['can_delete'] = auth()->user()->can('delete', $product);
            return $product;
        }, $products);
        // @codeCoverageIgnoreEnd

        return Inertia::render('Products/Index', [
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Products/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateProductRequest $request)
    {
        $product = Product::create($request->validated());

        session()->flash('alert', [
            'type' => 'success',
            'message' => 'O produto foi criado com sucesso.'
        ]);

        return Redirect::route('products.show', $product);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $product['can_update'] = auth()->user()->can('update', $product);
        $product['can_delete'] = auth()->user()->can('delete', $product);

        return Inertia::render('Products/Show', [
            'product' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return Inertia::render('Products/Edit', [
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update($request->validated());


        session()->flash('alert', [
            'type' => 'success',
            'message' => 'O produto foi atualizado com sucesso.'
        ]);

        return Redirect::route('products.show', $product);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        session()->flash('alert', [
            'type' => 'success',
            'message' => 'O produto foi deletado com sucesso.',
        ]);

        return Redirect::route('products.index');
    }
}
