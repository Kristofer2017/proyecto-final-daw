<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\DoctoresController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PacientesController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\SeguroController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('auth');

// Rutas para: Auth
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
Route::get('/roles', [RolController::class, 'index'])->name('roles.index')->middleware(['auth', 'rol.admin:permitir']);
Route::get('/roles/crear', [RolController::class, 'create'])->middleware(['auth', 'rol.admin:permitir']);
Route::post('/roles/guardar', [RolController::class, 'store'])->middleware(['auth', 'rol.admin:permitir']);
Route::get('/roles/editar/{id}', [RolController::class, 'edit'])->middleware(['auth', 'rol.admin:permitir']);
Route::post('/roles/actualizar', [RolController::class, 'update'])->middleware(['auth', 'rol.admin:permitir']);
Route::get('/roles/eliminar/{id}', [RolController::class, 'destroy'])->middleware(['auth', 'rol.admin:permitir']);

// Rutas para: Usuarios
Route::get('/usuarios', [UsuarioController::class, 'index'] )->name('usuarios.index')->middleware(['auth', 'rol.admin:permitir']);
Route::get('/usuarios/crear', [UsuarioController::class, 'create'])->middleware(['auth', 'rol.admin:permitir']);
Route::post('/usuarios/guardar', [UsuarioController::class, 'store'])->middleware(['auth', 'rol.admin:permitir']);
Route::get('/usuarios/editar/{id}', [UsuarioController::class, 'edit'])->middleware(['auth', 'rol.admin:permitir']);
Route::post('/usuarios/actualizar', [UsuarioController::class, 'update'])->middleware(['auth', 'rol.admin:permitir']);
Route::get('/usuarios/eliminar/{id}', [UsuarioController::class, 'destroy'])->middleware(['auth', 'rol.admin:permitir']);

// Rutas para: Citas
Route::get('/citas', [CitaController::class, 'index'] )->name('citas.index')->middleware(['auth', 'rol.admin:negar']);
Route::get('/citas/crear', [CitaController::class, 'create'] )->middleware(['auth', 'rol.admin:negar']);
Route::post('/citas/guardar', [CitaController::class, 'store'] )->middleware(['auth', 'rol.admin:negar']);
Route::get('/citas/editar/{id}', [CitaController::class, 'edit'])->middleware(['auth', 'rol.admin:negar']);
Route::post('/citas/actualizar', [CitaController::class, 'update'])->middleware(['auth', 'rol.admin:negar']);
Route::get('/citas/cancelar/{id}', [CitaController::class, 'cancel'] )->middleware(['auth', 'rol.admin:negar']);
Route::get('/citas/completar/{id}', [CitaController::class, 'complete'] )->middleware(['auth', 'rol.admin:negar']);

// Rutas para: Seguros
Route::get('/seguros', [SeguroController::class, 'index'] )->name('seguros.index')->middleware(['auth', 'rol.admin:negar']);
Route::get('/seguros/crear', [SeguroController::class, 'create'] )->middleware(['auth', 'rol.admin:negar']);
Route::post('/seguros/guardar', [SeguroController::class, 'store'] )->middleware(['auth', 'rol.admin:negar']);
Route::get('/seguros/editar/{id}', [SeguroController::class, 'edit'] )->middleware(['auth', 'rol.admin:negar']);
Route::post('/seguros/actualizar', [SeguroController::class, 'update'] )->middleware(['auth', 'rol.admin:negar']);
Route::get('/seguros/eliminar/{id}', [SeguroController::class, 'destroy'] )->middleware(['auth', 'rol.admin:negar']);

// Rutas para Pacientes queriendo ver Doctores
Route::get('/doctores', [DoctoresController::class, 'index'])->name('doctores.index')->middleware(['auth', 'rol.admin:negar']);
Route::get('/doctores/agendar/{id}', [DoctoresController::class, 'shedule'])->middleware(['auth', 'rol.admin:negar']);

// Rutas para Doctores queriendo ver Pacientes
Route::get('/pacientes', [PacientesController::class, 'index'])->name('pacientes.index')->middleware(['auth', 'rol.admin:negar']);
Route::get('/pacientes/agendar/{id}', [PacientesController::class, 'shedule'])->middleware(['auth', 'rol.admin:negar']);