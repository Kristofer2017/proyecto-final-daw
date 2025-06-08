<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    // Mapeamos la tabla
    protected $table = 'usuarios';
    protected $primaryKey = 'usuario_id';
    public $timestamps = false;
    protected $fillable = [
        'fecha_creacion', 
        'activo', 
        'nombre', 
        'apellido', 
        'email', 
        'password', 
        'rol_id'
    ];

    protected $attributes = [
        'activo' => 'N' // Valor por defecto
    ];

    // CRUD
    public function crear(Usuario $usuario) {
        return $usuario->save();
    }

    public function obtenerTodos() {
        return Usuario::all();
    }

    public function obtenerPorUsuarioId(int $id) {
        return Usuario::find($id);
    }

    public function actualizar(Usuario $usuario) {
        return $usuario->save();
    }

    public function eliminar(int $id) {
        $usuario = Usuario::find($id);
        return $usuario->delete();
    }
    
    public function rol() {
        return $this->belongsTo(Rol::class, 'rol_id', 'rol_id');
    }

    public function hasRole(string $nombreRol) {
        return $this->rol->nombre == $nombreRol;
    }
}
