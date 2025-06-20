<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
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

    protected $attributes = [ 'activo' => 'Y' ];

    public function crear(Usuario $usuario) {
        $usuario->save();
        return $usuario;
    }

    public function obtenerTodos() {
        return Usuario::all();
    }

    public function obtenerPorUsuarioId(int $id) {
        return Usuario::find($id);
    }

    public function actualizar(Usuario $usuario) {
        $usuario->save();
        return $usuario;
    }

    public function eliminar(int $id) {
        $usuario = Usuario::find($id);
        return $usuario->delete();
    }
    
    // Relación 1 a 1 que indica que éste usuario pertenece a un rol específico
    public function rol() {
        return $this->belongsTo(Rol::class, 'rol_id', 'rol_id');
    }

    // Helper para determinar si un usuarion tiene determinado rol
    public function hasRole($rol) {
        return $this->rol->nombre == $rol;
    }

    // También es relación uno a uno - la llave foránea está en el perfil del paciente, no en usuario
    public function perfilPaciente() {
        return $this->hasOne(PerfilPaciente::class, 'usuario_id');
    }

    public function perfilDoctor() {
        return $this->hasOne(PerfilDoctor::class, 'usuario_id');
    }
}
