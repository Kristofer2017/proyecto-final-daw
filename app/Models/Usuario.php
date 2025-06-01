<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
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
        'correo', 
        'contra', 
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

    public function actualizar(Usuario $usuario) {
        return $usuario->save();
    }

    public function eliminar(int $id) {
        $usuario = Usuario::find($id);
        return $usuario->delete();
    }

    // Funciones adicionales
    public function obtenerUsuarioPorUsuarioId(int $id) {
        return Usuario::find($id);
    }

    public function obtenerUsuarioPorNombre(string $nombre) {
        return Usuario::where('nombre', $nombre)->first(); // REVISAR
    }

    function obtenerUsuarioPorNombreYPassword(string $nombre, string $password) {
        return Usuario::where('nombre', $nombre)->where('password', $password)->first();
    }
}
