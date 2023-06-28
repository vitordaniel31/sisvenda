<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CreatePaymentMethodRequest;
use App\Http\Requests\UpdatePaymentMethodRequest;
use App\Models\PaymentMethod;
use Inertia\Inertia;

use function App\Helpers\selectionPaymentMethodsNames;

class PaymentMethodController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(PaymentMethod::class, 'paymentMethod');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paymentMethods = PaymentMethod::all();

        // @codeCoverageIgnoreStart
        $paymentMethods = collect($paymentMethods)->map(function ($paymentMethod) {
            $paymentMethod['can_update'] = auth()->user()->can('update', $paymentMethod);
            $paymentMethod['can_delete'] = auth()->user()->can('delete', $paymentMethod);
            return $paymentMethod;
        }, $paymentMethods);
        // @codeCoverageIgnoreEnd

        return Inertia::render('PaymentMethods/Index', [
            'paymentMethods' => $paymentMethods
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $keyNames = selectionPaymentMethodsNames();

        return Inertia::render('PaymentMethods/Create', [
            'keyNames' => $keyNames,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreatePaymentMethodRequest $request)
    {
        $paymentMethod = PaymentMethod::create($request->validated());

        session()->flash('alert', [
            'type' => 'success',
            'message' => 'A forma de pagamento foi cadastrado com sucesso.'
        ]);

        return Redirect::route('paymentMethods.show', $paymentMethod);
    }

    /**
     * Display the specified resource.
     */
    public function show(PaymentMethod $paymentMethod)
    {
        $keyNames = selectionPaymentMethodsNames();

        $paymentMethod['can_update'] = auth()->user()->can('update', $paymentMethod);
        $paymentMethod['can_delete'] = auth()->user()->can('delete', $paymentMethod);

        return Inertia::render('PaymentMethods/Show', [
            'paymentMethod' => $paymentMethod,
            'keyNames' => $keyNames,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PaymentMethod $paymentMethod)
    {
        $keyNames = selectionPaymentMethodsNames();

        return Inertia::render('PaymentMethods/Edit', [
            'paymentMethod' => $paymentMethod,
            'keyNames' => $keyNames,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePaymentMethodRequest $request, PaymentMethod $paymentMethod)
    {
        $paymentMethod->update($request->validated());

        session()->flash('alert', [
            'type' => 'success',
            'message' => 'A forma de pagamento foi atualizado com sucesso.'
        ]);

        return Redirect::route('paymentMethods.show', $paymentMethod);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PaymentMethod $paymentMethod)
    {
        $paymentMethod->delete();

        session()->flash('alert', [
            'type' => 'success',
            'message' => 'A forma de pagamento foi deletado com sucesso.'
        ]);

        return Redirect::route('paymentMethods.index');
    }
}
