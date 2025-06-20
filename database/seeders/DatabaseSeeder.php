<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            RolesSeeder::class,
            UsuariosSeeder::class,
            PacientesSeeder::class,
            DoctoresSeeder::class,
            SegurosSeeder::class,
            CitasSeeder::class,
        ]);
        
    }
}
