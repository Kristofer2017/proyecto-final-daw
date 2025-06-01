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

// Rutas para: Roles
Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');