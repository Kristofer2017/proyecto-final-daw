<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PerfilPaciente extends Model
{
    // Mapeamos la tabla
    protected $table = 'perfil_pacientes';
    protected $primaryKey = 'paciente_id';
    public $timestamps = false;
    protected $fillable = [
        'fecha_nacimiento', 
        'telefono', 
        'usuario_id'
    ];

    public function crear(PerfilPaciente $paciente) {
        $paciente->save();
        return $paciente;
    }

    public function obtenerTodos() {
        return PerfilPaciente::all();
    }

    public function actualizar(PerfilPaciente $paciente) {
        return $paciente->save();
    }

    public function eliminar(int $id) {
        $paciente = PerfilPaciente::find($id);
        return $paciente->delete();
    }
    
    public function user()
    {
        return $this->belongsTo(Usuario::class);
    }
}
