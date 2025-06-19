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
            'fecha_nacimiento' => '1990-03-15',
            'telefono' => '7015-2020',
            'usuario_id' => 1
        ]);

        PerfilPaciente::create([
            'fecha_nacimiento' => '1985-07-20',
            'telefono' => '7012-2222',
            'usuario_id' => 2
        ]);

        PerfilPaciente::create([
            'fecha_nacimiento' => '1992-05-12',
            'telefono' => '7013-3333',
            'usuario_id' => 3
        ]);

        PerfilPaciente::create([
            'fecha_nacimiento' => '1998-10-30',
            'telefono' => '7014-4444',
            'usuario_id' => 4
        ]);

        PerfilPaciente::create([
            'fecha_nacimiento' => '2000-01-25',
            'telefono' => '7015-5555',
            'usuario_id' => 5
        ]);

        PerfilPaciente::create([
            'fecha_nacimiento' => '1996-12-09',
            'telefono' => '7016-6666',
            'usuario_id' => 6
        ]);

        PerfilPaciente::create([
            'fecha_nacimiento' => '1989-06-17',
            'telefono' => '7017-7777',
            'usuario_id' => 7
        ]);

        PerfilPaciente::create([
            'fecha_nacimiento' => '1994-08-03',
            'telefono' => '7018-8888',
            'usuario_id' => 8
        ]);

        PerfilPaciente::create([
            'fecha_nacimiento' => '1997-11-11',
            'telefono' => '7019-9999',
            'usuario_id' => 9
        ]);

        PerfilPaciente::create([
            'fecha_nacimiento' => '1991-04-22',
            'telefono' => '7020-0000',
            'usuario_id' => 10
        ]);

        PerfilPaciente::create([
            'fecha_nacimiento' => '2001-05-17',
            'telefono' => '6482-1641',
            'usuario_id' => 21
        ]);

    }
}
