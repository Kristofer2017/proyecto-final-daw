<?php

namespace Database\Seeders;

use App\Models\Seguro;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SegurosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Seguro::create([
            'fecha_creacion' => now(),
            'activo' => 'Y',
            'nombre' => 'Asesuisa',
            'telefono' => '7120-1510',
        ]);

        Seguro::create([
            'fecha_creacion' => now(),
            'activo' => 'Y',
            'nombre' => 'Mapfre',
            'telefono' => '7224-0101',
        ]);

        Seguro::create([
            'fecha_creacion' => now(),
            'activo' => 'Y',
            'nombre' => 'Seguros Azul',
            'telefono' => '4642-7241',
        ]);

        Seguro::create([
            'fecha_creacion' => now(),
            'activo' => 'Y',
            'nombre' => 'ASSA',
            'telefono' => '7852-6444',
        ]);

        Seguro::create([
            'fecha_creacion' => now(),
            'activo' => 'Y',
            'nombre' => 'SISA',
            'telefono' => '7646-1270',
        ]);
    }
}
