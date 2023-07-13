<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\ProductSale;
use App\Models\Sale;
use App\Models\User;
use Inertia\Inertia;
use App\Models\Product;
use App\Models\PaymentMethod;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $reportSales = Bill::whereRelation('sale', 'created_at', '>=', date('Y-m-d 00:00:00'))
            ->whereRelation("sale", "status_id", Sale::STATUS_FINISHED['id'])
            ->sum('total');

            
        $products = Product::count();

        $paymentMethod = PaymentMethod::count();

        $administrators = count(User::all()->filter(function ($user) {
            return $user->role_id === 1;
        }));

        $maneger = count(User::all()->filter(function ($user) {
            return $user->role_id === 2;
        }));

        return Inertia::render('Dashboard', [
            'products' => $products,
            'paymentMethod' => $paymentMethod,
            'administrators' => $administrators,
            'maneger' => $maneger,
            'reportSales' => $reportSales
        ]);
    }
}