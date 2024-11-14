<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Cliente Ejemplo',
            'email' => 'cliente@example.com',
            'password' => Hash::make('password'),
            'usertype' => 'user',
            'telefono' => '1234567890',
            'direccion' => 'Direccion Ejemplo'
        ]);

        User::create([
            'name' => 'Empleado Ejemplo',
            'email' => 'empleado@example.com',
            'password' => Hash::make('password'),
            'usertype' => 'vendedor',
            'telefono' => '0987654321',
            'direccion' => 'Direccion Ejemplo'
        ]);
    }
}

