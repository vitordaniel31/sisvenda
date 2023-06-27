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
        $this->authorizeResource(PaymentMethod::class);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paymeths = PaymentMethod::all();

        // @codeCoverageIgnoreStart
        $paymeths = collect($paymeths)->map(function ($paymeth) {
            $paymeth['can_update'] = auth()->user()->can('update', $paymeth);
            $paymeth['can_delete'] = auth()->user()->can('delete', $paymeth);
            return $paymeth;
        }, $paymeths);
        // @codeCoverageIgnoreEnd

        return Inertia::render('PaymentMethods/Index', [
            'paymentmethods' => $paymeths
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
        $paymeth = PaymentMethod::create($request->validated());

        session()->flash('alert', [
            'type' => 'success',
            'message' => 'A forma de pagamento foi cadastrada com sucesso.'
        ]);

        return Redirect::route('paymentmethods.show', $paymeth);
    }

    /**
     * Display the specified resource.
     */
    public function show(PaymentMethod $paymeth)
    {
        $keyNames = selectionPaymentMethodsNames();

        $paymeth['can_update'] = auth()->user()->can('update', $paymeth);
        $paymeth['can_delete'] = auth()->user()->can('delete', $paymeth);

        return Inertia::render('PaymentMethods/Show', [
            'paymentmethod' => $paymeth,
            'keyNames' => $keyNames,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PaymentMethod $paymeth)
    {
        $keyNames = selectionPaymentMethodsNames();

        return Inertia::render('PaymentMethods/Edit', [
            'paymentmethod' => $paymeth,
            'keyNames' => $keyNames,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePaymentMethodRequest $request, PaymentMethod $paymeth)
    {
        $paymeth->update($request->validated());

        session()->flash('alert', [
            'type' => 'success',
            'message' => 'A forma de pagamento foi atualizada com sucesso.'
        ]);

        return Redirect::route('paymentmethods.show', $paymeth);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PaymentMethod $paymeth)
    {
        $paymeth->delete();

        session()->flash('alert', [
            'type' => 'success',
            'message' => 'A forma de pagamento foi deletada com sucesso.'
        ]);

        return Redirect::route('paymentmethods.index');
    }
}
