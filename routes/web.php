<?php
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    return view('/home/index');

});

Route::get('/auth', function () {
    return view('/auth/login');
});

// Rutas para: Roles
Route::get('/roles', [RolController::class, 'index'])->name('roles.index');
Route::get('/roles/crear', [RolController::class, 'create']);
Route::post('/roles/guardar', [RolController::class, 'store']);
Route::get('/roles/editar/{id}', [RolController::class, 'edit']);
Route::post('/roles/actualizar', [RolController::class, 'update']);
Route::get('/roles/eliminar/{id}', [RolController::class, 'destroy']);

// Rutas para: Usuarios
Route::get('/usuarios', [UsuarioController::class, 'index'] )->name('usuarios.index');
Route::get('/usuarios/crear', [UsuarioController::class, 'create']);
Route::post('/usuarios/guardar', [UsuarioController::class, 'store']);
Route::get('/usuarios/editar/{id}', [UsuarioController::class, 'edit']);
Route::post('/usuarios/actualizar', [UsuarioController::class, 'update']);
Route::get('/usuarios/eliminar/{id}', [UsuarioController::class, 'destroy']);