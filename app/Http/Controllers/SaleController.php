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
        $sale['can_update'] = auth()->user()->can('update', $sale);
        $sale['can_delete'] = auth()->user()->can('delete', $sale);

        return Inertia::render('Sales/Show', [
            'sale' => $sale
        ]);
    }
}
