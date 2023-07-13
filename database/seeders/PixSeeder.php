<?php

namespace Database\Seeders;

use App\Models\Pix;
use Illuminate\Database\Seeder;

class PixSeeder extends Seeder
{
    private $pixes = [
        [
            'name' => 'Ketlly Azevedo de Medeiros',
            'key' => '84996949822',
            'type_id' => 1
        ],
        [
            'name' => 'José Pererira de Araújo Marques',
            'key' => '09051447900',
            'type_id' => 0
        ],
        [
            'name' => 'Vitor Daniel Lócio de Medeiros',
            'key' => 'vitor@gmail.com',
            'type_id' => 2
        ],
        [
            'name' => 'Juliana Daniele Lopes da Silva',
            'key' => 'asfdjkhdskfy7674rewjhg',
            'type_id' => 3
        ],
        [
            'name' => 'Roberto Antonio de Azevedo Lopes',
            'key' => 'Robeberto@gmail.com',
            'type_id' => 2
        ],
    ];


    public function run()
    {
        foreach ($this->pixes as $pixToCreate) {
            $pixes = Pix::firstOrCreate([
                'key' => $pixToCreate['key'],
            ], [
                'name' => $pixToCreate['name'],
                'type_id' => $pixToCreate['type_id']
            ]);
        }
    }
}
