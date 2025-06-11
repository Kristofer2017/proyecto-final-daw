<?php

namespace Database\Seeders;

use App\Models\PerfilPaciente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PacientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PerfilPaciente::create([
            'fecha_nacimiento' => '1999-01-01',
            'telefono' => '70152020',
            'usuario_id' => 1
        ]);
    }
}
