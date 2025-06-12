<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    protected $table = 'citas';
    protected $primaryKey = 'cita_id';
    public $timestamps = false;
    protected $fillable = [
        'fecha_programada', 
        'paciente_id',
        'doctor_id',
        'estado',
        'notas',
    ];

    protected $attributes = [
        'estado' => 'En Progreso' // Valor por defecto
    ];

    public function crear(Cita $cita) {
        $cita->save();
        return $cita;
    }

    public function obtenerTodos() {
        return Cita::all();
    }

    public function actualizar(Cita $cita) {
        return $cita->save();
    }

    public function eliminar(int $id) {
        $cita = Cita::find($id);
        return $cita->delete();
    }

    // Relación 1:1 con paciente - la cita sólo puede pertenecer a un paciente
    public function paciente(){
        return $this->belongsTo(PerfilPaciente::class, 'paciente_id');
    }

    // Relación 1:1 con doctor - la cita sólo puede pertenecer a un doctor
    public function doctor(){
        return $this->belongsTo(PerfilDoctor::class, 'doctor_id');
    }
}
