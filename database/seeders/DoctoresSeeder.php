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
            'licencia' => '104-530-7870',
            'especialidad' => 'Odontología',
            'ubicacion' => '4ta. Avenida Norte N.4, Santa Tecla, El Salvador',
            'usuario_id' => 11
        ]);

        PerfilDoctor::create([
            'licencia' => '205-412-6580',
            'especialidad' => 'Cardiología',
            'ubicacion' => 'Av. Roosevelt, San Salvador',
            'usuario_id' => 12
        ]);

        PerfilDoctor::create([
            'licencia' => '306-789-1123',
            'especialidad' => 'Pediatría',
            'ubicacion' => 'Clínica Los Olivos, Santa Ana',
            'usuario_id' => 13
        ]);

        PerfilDoctor::create([
            'licencia' => '407-654-8899',
            'especialidad' => 'Dermatología',
            'ubicacion' => 'Colonia Médica, San Salvador',
            'usuario_id' => 14
        ]);

        PerfilDoctor::create([
            'licencia' => '508-332-1100',
            'especialidad' => 'Ginecología',
            'ubicacion' => 'Hospital La Familia, Sonsonate',
            'usuario_id' => 15
        ]);

        PerfilDoctor::create([
            'licencia' => '609-441-5566',
            'especialidad' => 'Neurología',
            'ubicacion' => 'Clínica del Centro, San Miguel',
            'usuario_id' => 16
        ]);

        PerfilDoctor::create([
            'licencia' => '710-223-4477',
            'especialidad' => 'Oftalmología',
            'ubicacion' => 'Centro Óptico Plus, Santa Tecla',
            'usuario_id' => 17
        ]);

        PerfilDoctor::create([
            'licencia' => '811-987-6633',
            'especialidad' => 'Traumatología',
            'ubicacion' => 'Hospital Nacional Rosales',
            'usuario_id' => 18
        ]);

        PerfilDoctor::create([
            'licencia' => '912-111-2244',
            'especialidad' => 'Medicina General',
            'ubicacion' => 'Unidad de Salud, Ilopango',
            'usuario_id' => 19
        ]);

        PerfilDoctor::create([
            'licencia' => '013-345-7890',
            'especialidad' => 'Psiquiatría',
            'ubicacion' => 'Clínica Integral, Soyapango',
            'usuario_id' => 20
        ]);
    }
}
