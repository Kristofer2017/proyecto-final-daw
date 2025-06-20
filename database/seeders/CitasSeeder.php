<?php

namespace Database\Seeders;

use App\Models\Cita;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitasSeeder extends Seeder
{
    public function run(): void
    {
        Cita::create([
            'fecha_programada' => '2025-06-23 12:00:00',
            'estado' => 'En Progreso',
            'notas' => 'Revisión postoperatoria del paciente después de la cirugía.',
            'paciente_id' => 1,
            'doctor_id' => 1,
        ]);

        Cita::create([
            'fecha_programada' => '2025-06-24 12:00:00',
            'estado' => 'En Progreso',
            'notas' => 'Control mensual de paciente, traer bitácora de glucosa.',
            'paciente_id' => 1,
            'doctor_id' => 1,
        ]);

        Cita::create([
            'fecha_programada' => '2025-06-25 12:00:00',
            'estado' => 'En Progreso',
            'notas' => 'Ajuste de medicamento recetado la semana pasada.',
            'paciente_id' => 2,
            'doctor_id' => 1,
        ]);

        Cita::create([
            'fecha_programada' => '2025-06-26 12:00:00',
            'estado' => 'En Progreso',
            'notas' => 'Interpretar resultados de laboratorio entregados el lunes.',
            'paciente_id' => 1,
            'doctor_id' => 2,
        ]);
        
        Cita::create([
            'fecha_programada' => '2025-06-27 12:00:00',
            'estado' => 'Cancelada',
            'notas' => 'Paciente con historial de migrañas, evaluación recomendada.',
            'paciente_id' => 1,
            'doctor_id' => 5,
        ]);

        Cita::create([
            'fecha_programada' => '2025-06-28 12:00:00',
            'estado' => 'En Progreso',
            'notas' => 'Dolor de pecho en los últimos días, quiero una evaluación.',
            'paciente_id' => 1,
            'doctor_id' => 7,
        ]);

        Cita::create([
            'fecha_programada' => '2025-06-29 12:00:00',
            'estado' => 'Completada',
            'notas' => 'Necesito renovar receta para presión arterial.',
            'paciente_id' => 2,
            'doctor_id' => 9,
        ]);

        Cita::create([
            'fecha_programada' => '2025-06-30 12:00:00',
            'estado' => 'En Progreso',
            'notas' => 'Quiero hablar sobre resultados de mis exámenes de sangre.',
            'paciente_id' => 1,
            'doctor_id' => 4,
        ]);

        Cita::create([
            'fecha_programada' => '2025-07-01 12:00:00',
            'estado' => 'Completada',
            'notas' => 'Mucho cansancio últimamente, necesito orientación médica.',
            'paciente_id' => 6,
            'doctor_id' => 7,
        ]);

        Cita::create([
            'fecha_programada' => '2025-07-02 12:00:00',
            'estado' => 'Completada',
            'notas' => 'Tengo dudas sobre un tratamiento que me recetaron.',
            'paciente_id' => 3,
            'doctor_id' => 7,
        ]);

        Cita::create([
            'fecha_programada' => '2025-07-03 12:00:00',
            'estado' => 'En Progreso',
            'notas' => 'Se recomienda seguimiento en 5 días por control de presión.',
            'paciente_id' => 2,
            'doctor_id' => 4,
        ]);
    }
}
