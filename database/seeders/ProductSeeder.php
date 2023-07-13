<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ProductSeeder extends Seeder
{
    private $products = [
        [
            'name' => 'Calcinha 018',
            'price' => '8.00',
        ],
        [
            'name' => 'Calcinha 046',
            'price' => '11.00',
        ],
        [
            'name' => 'Calcinha Renda',
            'price' => '10.00',
        ],
        [
            'name' => 'Calcinha fio duplo',
            'price' => '10.00',
        ],
        [
            'name' => 'Calcinha Gladiadora',
            'price' => '10.00',
        ],
    ];


    public function run()
    {
        foreach ($this->products as $productToCreate) {
            $product = Product::firstOrCreate([
                'name' => $productToCreate['name']
            ], [
                'price' => $productToCreate['price']
            ]);
        }
    }
}