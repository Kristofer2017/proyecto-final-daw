<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = 'roles';
    protected $primaryKey = 'rol_id';
    public $timestamps = false;

    protected $fillable = [
        'fecha_creacion',
        'activo',
        'nombre'
    ];

    protected $attributes = [
        'activo' => 'N' 
    ];

    public function crear(Rol $rol) {
        return $rol->save();
    }

    public function obtenerTodos() {
        return Rol::all();
    }

    public function obtenerPorRolId(int $rol_id) {
        return Rol::find($rol_id);
    }

    public function actualizar(Rol $rol) {
        $rol->save();
    }

    public function eliminarPorRolId(int $rol_id) {
        $rol = Rol::find($rol_id);
        $rol->delete();
    }
}
