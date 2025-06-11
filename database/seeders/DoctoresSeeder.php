<?php

namespace Database\Seeders;

use App\Models\PerfilDoctor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DoctoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PerfilDoctor::create([
            'licencia' => '1045307870',
            'especialidad' => 'Odontología',
            'ubicacion' => '4ta. Avenida Norte N.4, Santa Tecla, El Salvador',
            'usuario_id' => 2
        ]);
    }
}
