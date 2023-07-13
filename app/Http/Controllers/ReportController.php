<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Product;
use App\Models\ProductSale;
use App\Models\Sale;

class ReportController extends Controller
{
    public function index()
    {
        $dateInit = request('dateInit');
        $dateFinish = request('dateFinish');

        $products = Product::all();
        $sales = Sale::all();
        $proSales = ProductSale::select()
            ->join('products', 'product_sales.product_id', '=', 'products.id')
            ->join('sales', 'product_sales.sale_id', '=', 'sales.id')
            ->whereBetween('product_sales.created_at', [$dateInit, $dateFinish])
            ->get();
            
        return Inertia::render('Report', [
            'sales' => $sales,
            'products' => $products,
            'proSales' => $proSales,
            'dateInit' => $dateInit,
            'dateFinish' => $dateFinish
        ]);
    }
}
