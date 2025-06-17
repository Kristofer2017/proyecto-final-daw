<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PerfilPaciente extends Model
{
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
    
    // Relación 1:1 con paciente - un paciente solo puede tener un perfil de usuario
    public function usuario() {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }

    // Relación 1:N con citas - un paciente puede tener muchas citas
    public function citas() {
        return $this->hasMany(Cita::class, 'paciente_id');
    }

    // Recuperando todos los seguros del paciente mediante la tabla pivote
    public function seguros()
    {
        return $this->belongsToMany(Seguro::class, 'pacientes_seguros', 'paciente_id', 'seguro_id')->withPivot('activo', 'tipo_plan', 'numero_seguro');
    }
}
