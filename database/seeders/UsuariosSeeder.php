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
        // Usuarios con rol de paciente
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
            'nombre' => 'Carlos',
            'apellido' => 'Ramírez',
            'email' => 'carlos@gmail.com',
            'password' => Hash::make('1234'),
            'rol_id' => 1
        ]);

        Usuario::create([
            'fecha_creacion' => now(),
            'activo' => 'Y',
            'nombre' => 'Ana',
            'apellido' => 'López',
            'email' => 'ana@gmail.com',
            'password' => Hash::make('1234'),
            'rol_id' => 1
        ]);

        Usuario::create([
            'fecha_creacion' => now(),
            'activo' => 'Y',
            'nombre' => 'Luis',
            'apellido' => 'Martínez',
            'email' => 'luis@gmail.com',
            'password' => Hash::make('1234'),
            'rol_id' => 1
        ]);

        Usuario::create([
            'fecha_creacion' => now(),
            'activo' => 'Y',
            'nombre' => 'Jessica',
            'apellido' => 'Castro',
            'email' => 'jessica@gmail.com',
            'password' => Hash::make('1234'),
            'rol_id' => 1
        ]);

        Usuario::create([
            'fecha_creacion' => now(),
            'activo' => 'Y',
            'nombre' => 'Andrés',
            'apellido' => 'Morales',
            'email' => 'andres@gmail.com',
            'password' => Hash::make('1234'),
            'rol_id' => 1
        ]);

        Usuario::create([
            'fecha_creacion' => now(),
            'activo' => 'Y',
            'nombre' => 'Valeria',
            'apellido' => 'Mendoza',
            'email' => 'valeria@gmail.com',
            'password' => Hash::make('1234'),
            'rol_id' => 1
        ]);

        Usuario::create([
            'fecha_creacion' => now(),
            'activo' => 'Y',
            'nombre' => 'Jorge',
            'apellido' => 'Delgado',
            'email' => 'jorge@gmail.com',
            'password' => Hash::make('1234'),
            'rol_id' => 1
        ]);

        Usuario::create([
            'fecha_creacion' => now(),
            'activo' => 'Y',
            'nombre' => 'Sofía',
            'apellido' => 'Herrera',
            'email' => 'sofia@gmail.com',
            'password' => Hash::make('1234'),
            'rol_id' => 1
        ]);

        Usuario::create([
            'fecha_creacion' => now(),
            'activo' => 'Y',
            'nombre' => 'Diego',
            'apellido' => 'Reyes',
            'email' => 'diego@gmail.com',
            'password' => Hash::make('1234'),
            'rol_id' => 1
        ]);

        
        // Usuarios con rol de doctor
        Usuario::create([
            'fecha_creacion' => now(),
            'activo' => 'Y',
            'nombre' => 'Maria',
            'apellido' => 'Perez',
            'email' => 'maria@gmail.com',
            'password' => Hash::make('1234'),
            'rol_id' => 2
        ]);

        Usuario::create([
            'fecha_creacion' => now(),
            'activo' => 'Y',
            'nombre' => 'Diana',
            'apellido' => 'Vargas',
            'email' => 'diana@gmail.com',
            'password' => Hash::make('1234'),
            'rol_id' => 2
        ]);

        Usuario::create([
            'fecha_creacion' => now(),
            'activo' => 'Y',
            'nombre' => 'Fernando',
            'apellido' => 'Silva',
            'email' => 'fernando@gmail.com',
            'password' => Hash::make('1234'),
            'rol_id' => 2
        ]);

        Usuario::create([
            'fecha_creacion' => now(),
            'activo' => 'Y',
            'nombre' => 'Gabriela',
            'apellido' => 'Cruz',
            'email' => 'gabriela@gmail.com',
            'password' => Hash::make('1234'),
            'rol_id' => 2
        ]);

        Usuario::create([
            'fecha_creacion' => now(),
            'activo' => 'Y',
            'nombre' => 'Raúl',
            'apellido' => 'Torres',
            'email' => 'raul@gmail.com',
            'password' => Hash::make('1234'),
            'rol_id' => 2
        ]);

        Usuario::create([
            'fecha_creacion' => now(),
            'activo' => 'Y',
            'nombre' => 'Patricia',
            'apellido' => 'Navarro',
            'email' => 'patricia@gmail.com',
            'password' => Hash::make('1234'),
            'rol_id' => 2
        ]);

        Usuario::create([
            'fecha_creacion' => now(),
            'activo' => 'Y',
            'nombre' => 'Laura',
            'apellido' => 'Zelaya',
            'email' => 'laura@gmail.com',
            'password' => Hash::make('1234'),
            'rol_id' => 2
        ]);

        Usuario::create([
            'fecha_creacion' => now(),
            'activo' => 'Y',
            'nombre' => 'Marco',
            'apellido' => 'Alvarado',
            'email' => 'marco@gmail.com',
            'password' => Hash::make('1234'),
            'rol_id' => 2
        ]);

        Usuario::create([
            'fecha_creacion' => now(),
            'activo' => 'Y',
            'nombre' => 'Camila',
            'apellido' => 'Estrada',
            'email' => 'camila@gmail.com',
            'password' => Hash::make('1234'),
            'rol_id' => 2
        ]);

        Usuario::create([
            'fecha_creacion' => now(),
            'activo' => 'Y',
            'nombre' => 'Esteban',
            'apellido' => 'Cornejo',
            'email' => 'esteban@gmail.com',
            'password' => Hash::make('1234'),
            'rol_id' => 2
        ]);

        // Usuario administrador
        Usuario::create([
            'fecha_creacion' => now(),
            'activo' => 'Y',
            'nombre' => 'Alex',
            'apellido' => 'Valladares',
            'email' => 'alex@gmail.com',
            'password' => Hash::make('1234'),
            'rol_id' => 3
        ]);
    }
}
