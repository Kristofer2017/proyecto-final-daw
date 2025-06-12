<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\CitaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/usuarios');
})->name('home');

// Rutas para: Login
Route::get('/auth/login', [LoginController::class, 'index'])->name('login');
Route::post('/auth/login', [LoginController::class, 'login']);
Route::post('/auth/logout', [LoginController::class, 'logout']);

Route::get('/auth/registro', [RegisterController::class, 'index'])->name('register');
Route::post('/auth/register', [RegisterController::class, 'register']);

// Rutas para: Roles
Route::get('/roles', [RolController::class, 'index'])->name('roles.index')->middleware('auth');
Route::get('/roles/crear', [RolController::class, 'create'])->middleware('auth');
Route::post('/roles/guardar', [RolController::class, 'store'])->middleware('auth');
Route::get('/roles/editar/{id}', [RolController::class, 'edit'])->middleware('auth');
Route::post('/roles/actualizar', [RolController::class, 'update'])->middleware('auth');
Route::get('/roles/eliminar/{id}', [RolController::class, 'destroy'])->middleware('auth');

// Rutas para: Usuarios
Route::get('/usuarios', [UsuarioController::class, 'index'] )->name('usuarios.index')->middleware('auth');
Route::get('/usuarios/crear', [UsuarioController::class, 'create'])->middleware('auth');
Route::post('/usuarios/guardar', [UsuarioController::class, 'store'])->middleware('auth');
Route::get('/usuarios/editar/{id}', [UsuarioController::class, 'edit'])->middleware('auth');
Route::post('/usuarios/actualizar', [UsuarioController::class, 'update'])->middleware('auth');
Route::get('/usuarios/eliminar/{id}', [UsuarioController::class, 'destroy'])->middleware('auth');

// Rutas para: Citas
Route::get('/citas', [CitaController::class, 'index'] )->name('citas.index')->middleware('auth');
Route::get('/citas/crear', [CitaController::class, 'create'] )->middleware('auth');
Route::post('/citas/guardar', [CitaController::class, 'store'] )->middleware('auth');