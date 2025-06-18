<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PacienteSeguro extends Model
{
    protected $table = 'pacientes_seguros';
    public $timestamps = false;
    protected $fillable = [
        'paciente_id',
        'seguro_id',
        'tipo_plan',
        'numero_seguro',
        'activo',
    ];

    protected $attributes = [ 'activo' => 'Y' ];

    public function crear(PacienteSeguro $seguro) {
        $seguro->save();
        return $seguro;
    }

    public function obtenerTodos() {
        return PacienteSeguro::all();
    }

    public function actualizar(PacienteSeguro $seguro) {
        return $seguro->save();
    }

    public function eliminar(int $id) {
        $seguro = PacienteSeguro::find($id);
        return $seguro->delete();
    }

    public function paciente() {
        return $this->belongsTo(PerfilPaciente::class, 'paciente_id');
    }

    public function seguro() {
        return $this->belongsTo(Seguro::class, 'seguro_id');
    }

    // Devuelve el seguro del paciente con el id seleccionado
    // El ID no es el del seguro, sino el id de la tabla intermedia
    public function obtenerSeguroPaciente(int $id, int $paciente_id) {
        return self::where('id', $id)->where('paciente_id', $paciente_id)->firstOrFail();
    }
}
