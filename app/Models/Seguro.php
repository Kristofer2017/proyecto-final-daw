<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seguro extends Model
{
    protected $table = 'seguros';
    protected $primaryKey = 'seguro_id';
    public $timestamps = false;
    protected $fillable = [
        'fecha_creacion', 
        'activo', 
        'nombre', 
        'telefono'
    ];

    protected $attributes = [ 'activo' => 'Y' ];

    public function crear(Seguro $seguro) {
        $seguro->save();
        return $seguro;
    }

    public function obtenerTodos() {
        return Seguro::all();
    }

    public function obtenerPorSeguroId(int $id) {
        return Seguro::find($id);
    }

    public function actualizar(Seguro $seguro) {
        return $seguro->save();
    }

    public function eliminar(int $id) {
        $seguro = Seguro::find($id);
        return $seguro->delete();
    }

}
