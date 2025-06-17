<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\PerfilController;
use App\Models\Cita;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/usuarios');
})->name('home');

// Rutas para: Login
Route::get('/auth/login', [LoginController::class, 'index'])->name('login');
Route::post('/auth/login', [LoginController::class, 'login']);
Route::post('/auth/logout', [LoginController::class, 'logout']);
Route::get('/auth/reset', [LoginController::class, 'reset']);

Route::get('/auth/registro', [RegisterController::class, 'index'])->name('register');
Route::post('/auth/register', [RegisterController::class, 'register']);


// Rutas para: Perfil
Route::get('/perfil', [PerfilController::class, 'index'])->name('perfil.index')->middleware('auth');
Route::post('/perfil/actualizar', [PerfilController::class, 'update'])->middleware('auth');
Route::post('/perfil/eliminar', [PerfilController::class, 'destroy'])->middleware('auth');

// Rutas para: Roles
Route::get('/roles', [RolController::class, 'index'])->name('roles.index')->middleware('auth');
Route::get('/roles/crear', [RolController::class, 'create'])->middleware('auth');
Route::post('/roles/guardar', [RolController::class, 'store'])->middleware('auth');
Route::get('/roles/editar/{id}', [RolController::class, 'edit'])->middleware('auth');
Route::post('/roles/actualizar', [RolController::class, 'update'])->middleware('auth');
Route::get('/roles/eliminar/{id}', [RolController::class, 'destroy'])->middleware('auth');

// Rutas para: Usuarios
Route::get('/usuarios', [UsuarioController::class, 'index'] )->name('usuarios.index')->middleware(['auth', 'rol']);
Route::get('/usuarios/crear', [UsuarioController::class, 'create'])->middleware('auth');
Route::post('/usuarios/guardar', [UsuarioController::class, 'store'])->middleware('auth');
Route::get('/usuarios/editar/{id}', [UsuarioController::class, 'edit'])->middleware('auth');
Route::post('/usuarios/actualizar', [UsuarioController::class, 'update'])->middleware('auth');
Route::get('/usuarios/eliminar/{id}', [UsuarioController::class, 'destroy'])->middleware('auth');

// Rutas para: Citas
Route::get('/citas', [CitaController::class, 'index'] )->name('citas.index')->middleware('auth');
Route::get('/citas/crear', [CitaController::class, 'create'] )->middleware('auth');
Route::post('/citas/guardar', [CitaController::class, 'store'] )->middleware('auth');

// Helper para obtener las citas de cada doctor
Route::get('/api/citas/ocupadas/{doctor_id}', function($doctor_id) {
    $citas = \App\Models\Cita::where('doctor_id', $doctor_id)
        ->where('estado', '!=', 'Cancelada') // O solo futuras si prefieres
        ->pluck('fecha_programada');

    $bloques = [];

    foreach ($citas as $cita) {
        $inicio = Carbon::parse($cita->fecha_programada);
        $fin = $inicio->copy()->addMinutes(30);

        $bloques[] = [
            'from' => $inicio->format('Y-m-d H:i'),
            'to' => $fin->format('Y-m-d H:i')
        ];
    }

    return response()->json($bloques);
});