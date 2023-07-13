<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Product;
use App\Models\ProductSale;
use App\Models\Sale;
use App\Models\PaymentMethod;

class ReportController extends Controller
{
    public function index()
    {
        $dateInit = request('dateInit');
        $dateFinish = request('dateFinish');

        $productBestSeller = ProductSale::select()
            ->join('sales', 'sales.id', '=', 'product_sales.sale_id')
            ->join('products', 'products.id', '=', 'product_id')
            ->select(ProductSale::raw('products.name, 
                SUM(products.price * product_sales.quantity) as totalSalesAmount, 
                SUM(quantity) as totalQuantity'))
            ->groupBy('products.name', 'product_id','products.price')
            ->orderByDesc('totalQuantity')
            ->take(3)
            ->whereBetween('product_sales.created_at', [$dateInit, $dateFinish])
            ->where('sales.status_id','=','1')
            ->get();
        
        foreach ($productBestSeller as $bestSeller){
            $bestSeller->totalSalesAmount = number_format($bestSeller->totalSalesAmount, 2, ',', '.');
        }

        $reportSales = ProductSale::select()
            ->join('sales', 'sales.id', '=', 'product_sales.sale_id')
            ->join('products', 'product_sales.product_id', '=', 'products.id')
            ->select(ProductSale::raw('COUNT(*) as totalSales, 
                SUM(product_sales.quantity) as totalProducts, 
                SUM(product_sales.quantity*product_sales.price) as totalSalesAmount'))
            ->whereBetween('product_sales.created_at', [$dateInit, $dateFinish])
            ->where('sales.status_id','=','1')
            ->get();

        foreach ($reportSales as $reportSale) {
            $reportSale->totalSalesAmount = number_format($reportSale->totalSalesAmount, 2, ',', '.');
        }

        $payments = ProductSale::select()
            ->join('sales', 'sales.id', '=', 'product_sales.sale_id')
            ->join('bills', 'sales.id', '=', 'bills.sale_id')
            ->join('bill_payment_method', 'bills.id', '=', 'bill_payment_method.bill_id')
            ->join('payment_methods', 'payment_methods.id', '=', 'bill_payment_method.payment_method_id')
            ->select(ProductSale::raw('
                COUNT(bill_payment_method.payment_method_id) as totalPaymentMethod,
                SUM(bill_payment_method.value) as totalPago'))
            ->groupby('payment_method_id')
            ->orderByDesc('totalPaymentMethod')
            ->take(3)
            ->whereBetween('product_sales.created_at', [$dateInit, $dateFinish])
            ->where('sales.status_id','=','1')
            ->get();
        
        foreach ($payments as $payment){
            $payment->totalPago = number_format($payment->totalPago, 2, '.', ',');
        }

        $paymentMethods = PaymentMethod::all();
        //dd($payments);

        return Inertia::render('Report', [
            'reportSales' => $reportSales,
            'dateInit' => $dateInit,
            'dateFinish' => $dateFinish,
            'productBestSeller' => $productBestSeller,
            'payments' => $payments,
            'paymentMethods' => $paymentMethods
        ]);
    }
}
