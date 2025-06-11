<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;

class UsuariosSeeder extends Seeder
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
            'rol_id' => 1
        ]);
        
        Usuario::create([
            'fecha_creacion' => now(),
            'activo' => 'Y',
            'nombre' => 'Maria',
            'apellido' => 'Perez',
            'email' => 'maria@gmail.com',
            'password' => Hash::make('1234'),
            'rol_id' => 2
        ]);
    }
}
