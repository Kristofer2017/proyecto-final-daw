<?php

namespace Database\Seeders;

use App\Models\Usuario;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Usuario::create([
            'fecha_creacion' => now(),
            'activo' => 'Y',
            'nombre' => 'Pedro',
            'apellido' => 'Gonzales',
            'email' => 'pedro@gmail.com',
            'password' => Hash::make('1234'),
            'rol_id' => 3
        ]);
    }
}
