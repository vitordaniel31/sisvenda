<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreatePaymentMethodRequest;
use App\Http\Requests\UpdatePaymentMethodRequest;
use App\Models\PaymentMethod;
use App\Models\Pix;
use Illuminate\Support\Facades\Redirect;
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
        $pixKeys = Pix::all()->map(function ($pix) {
            return [
                'id' => $pix->id,
                'label' => $pix->key,
            ];
        });

        // @codeCoverageIgnoreStart
        $paymentMethods = collect($paymentMethods)->map(function ($paymentMethod) {
            $paymentMethod['can_update'] = auth()->user()->can('update', $paymentMethod);
            $paymentMethod['can_delete'] = auth()->user()->can('delete', $paymentMethod);
            return $paymentMethod;
        }, $paymentMethods);
        // @codeCoverageIgnoreEnd

        return Inertia::render('PaymentMethods/Index', [
            'paymentMethods' => $paymentMethods,
            'pixKeys' => $pixKeys,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $keyNames = selectionPaymentMethodsNames();
        $pixKeys = Pix::all()->map(function ($pix) {
            return [
                'id' => $pix->id,
                'label' => $pix->key,
            ];
        });

        return Inertia::render('PaymentMethods/Create', [
            'keyNames' => $keyNames,
            'pixKeys' => $pixKeys,
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
            'message' => 'A forma de pagamento foi cadastrada com sucesso.'
        ]);

        return Redirect::route('paymentMethods.show', $paymentMethod);
    }

    /**
     * Display the specified resource.
     */
    public function show(PaymentMethod $paymentMethod)
    {
        $keyNames = selectionPaymentMethodsNames();
        $pixKeys = Pix::all()->map(function ($pix) {
            return [
                'id' => $pix->id,
                'label' => $pix->key,
            ];
        });

        $paymentMethod->load('pix');
        
        $paymentMethod['can_update'] = auth()->user()->can('update', $paymentMethod);
        $paymentMethod['can_delete'] = auth()->user()->can('delete', $paymentMethod);

        return Inertia::render('PaymentMethods/Show', [
            'paymentMethod' => $paymentMethod,
            'keyNames' => $keyNames,
            'pixKeys' => $pixKeys
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PaymentMethod $paymentMethod)
    {
        $keyNames = selectionPaymentMethodsNames();
        $pixKeys = Pix::all()->map(function ($pix) {
            return [
                'id' => $pix->id,
                'label' => $pix->key,
            ];
        });
        
        return Inertia::render('PaymentMethods/Edit', [
            'paymentMethod' => $paymentMethod,
            'keyNames' => $keyNames,
            'pixKeys' => $pixKeys,
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
            'message' => 'A forma de pagamento foi atualizada com sucesso.'
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
            'message' => 'A forma de pagamento foi deletada com sucesso.'
        ]);

        return Redirect::route('paymentMethods.index');
    }
}
