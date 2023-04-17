<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    private $users = [
        [
            'name' => 'Hugo Maia',
            'email' => 'hugo2mufrn@gmail.com',
            'password' => 'password',
            'roles' => [
                'Administrador Principal'
            ]
        ],
        [
            'name' => 'José Pereira',
            'email' => 'jose.marques15@hotmail.com',
            'password' => 'password',
            'roles' => [
                'Administrador Principal'
            ]
        ],
        [
            'name' => 'Ketlly Azevedo',
            'email' => 'ketlly.azevedo.090@ufrn.edu.br',
            'password' => 'password',
            'roles' => [
                'Administrador Principal'
            ]
        ],
        [
            'name' => 'Taciano Silva',
            'email' => 'taciano.silva@ufrn.br',
            'password' => 'password',
            'roles' => [
                'Administrador Principal'
            ]
        ],
        [
            'name' => 'Vitor Daniel',
            'email' => 'vitordaniel602@gmail.com',
            'password' => 'password',
            'roles' => [
                'Administrador Principal'
            ]
        ],
    ];


    public function run()
    {
        foreach ($this->users as $userToCreate) {
            $user = User::firstOrCreate([
                'email' => $userToCreate['email']
            ], [
                'name' => $userToCreate['name'],
                'password' => Hash::make($userToCreate['password']),
                'email_verified_at' => now()
            ]);

            $user->syncRoles($userToCreate['roles']);
        }
    }
}
