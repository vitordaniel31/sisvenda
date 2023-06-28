<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSaleRequest;
use App\Http\Requests\UpdateSaleRequest;
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
        return Inertia::render('Sales/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateSaleRequest $request)
    {
        $sale = Sale::create(\array_merge($request->validated(), [
            'status_id' => Sale::STATUS_OPEN['id'],
            'user_id' => auth()->user()->id,
        ]));

        session()->flash('alert', [
            'type' => 'success',
            'message' => 'A venda foi criada com sucesso.'
        ]);

        return Redirect::route('sales.show', $sale);
    }

    /**
     * Display the specified resource.
     */
    public function show(Sale $sale)
    {
        $sale['canUpdate'] = auth()->user()->can('update', $sale);
        $sale['canDelete'] = auth()->user()->can('delete', $sale);

        $sale->load('products');

        return Inertia::render('Sales/Show', [
            'sale' => $sale
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sale $sale)
    {
        $sale->load('products');

        return Inertia::render('Sales/Edit', [
            'sale' => $sale
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSaleRequest $request, Sale $sale)
    {
        $sale->update($request->validated());

        session()->flash('alert', [
            'type' => 'success',
            'message' => 'A venda foi atualizada com sucesso.'
        ]);

        return Redirect::route('sales.show', $sale);
    }
}
