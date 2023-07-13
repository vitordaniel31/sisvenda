<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBillRequest;
use App\Models\Bill;
use App\Models\PaymentMethod;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class BillController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Sale::class);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateBillRequest $request, Sale $sale)
    {
        $bill = $sale->bill()->updateOrCreate([
            'total' => $sale->total,
        ]);

        $billPaymentMethod = $bill->paymentMethods()
            ->wherePivot('payment_method_id', $request->payment_method_id)
            ->first();

        if ($billPaymentMethod) {
            $bill->paymentMethods()->updateExistingPivot($request->payment_method_id, [
                'value' => $request->value + ($billPaymentMethod->pivot->value ?? 0),
            ]);
        } else {
            $bill->paymentMethods()->attach($request->payment_method_id, [
                'value' => $request->value,
            ]);
        }

        return Redirect::route('sales.edit', $sale);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sale $sale, PaymentMethod $paymentMethod)
    {
        if ($sale->bill) {
            $sale->bill->paymentMethods()->detach($paymentMethod->id);

            session()->flash('alert', [
                'type' => 'success',
                'message' => 'A forma de pagamento foi removida da venda com sucesso.'
            ]);
        }

        return Redirect::route('sales.edit', $sale);
    }
}
