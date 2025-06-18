<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Rol;

class RolesSeeder extends Seeder
{
    public function run(): void
    {
        Rol::create([
            'fecha_creacion' => now(),
            'activo' => 'Y',
            'nombre' => 'Paciente',
        ]);

        Rol::create([
            'fecha_creacion' => now(),
            'activo' => 'Y',
            'nombre' => 'Doctor',
        ]);
        
        Rol::create([
            'fecha_creacion' => now(),
            'activo' => 'Y',
            'nombre' => 'Administrador',
        ]);
    }
}
