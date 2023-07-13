<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder
{
    private $paymentMethods = [
        [
            'name_id' => 0,
            'pix_id' => null,
            'notes' => null,
        ],
        [
            'name_id' => 1,
            'pix_id' => null,
            'notes' => null,
        ],
        [
            'name_id' => 2,
            'pix_id' => null,
            'notes' => 'MasterCard',
        ],
        [
            'name_id' => 3,
            'pix_id' => null,
            'notes' => 'Maestro',
        ],
        [
            'name_id' => 4,
            'pix_id' => 1,
            'notes' => null,
        ],
    ];


    public function run()
    {
        foreach ($this->paymentMethods as $paymentMethodToCreate) {
            $paymentMethods = PaymentMethod::firstOrCreate([
                'name_id' => $paymentMethodToCreate['name_id']
            ], [
                'pix_id' => $paymentMethodToCreate['pix_id'],
                'notes' => $paymentMethodToCreate['notes'],
            ]);
        }
    }
}
