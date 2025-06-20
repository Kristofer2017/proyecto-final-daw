<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PerfilDoctor extends Model
{
    // Mapeamos la tabla
    protected $table = 'perfil_doctores';
    protected $primaryKey = 'doctor_id';
    public $timestamps = false;
    protected $fillable = [
        'licencia', 
        'especialidad',
        'ubicacion',
        'usuario_id'
    ];

    public function crear(PerfilDoctor $doctor) {
        $doctor->save();
        return $doctor;
    }

    public function obtenerTodos() {
        return PerfilDoctor::all();
    }

    public function actualizar(PerfilDoctor $doctor) {
        return $doctor->save();
    }

    public function eliminar(int $id) {
        $doctor = PerfilDoctor::find($id);
        return $doctor->delete();
    }
    
    // Relación 1:1 con doctor - un doctor solo puede tener un perfil de usuario
    public function usuario() {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }

    // Relación 1:N con citas - un doctor puede tener muchas citas
    public function citas() {
        return $this->hasMany(Cita::class, 'doctor_id');
    }
}
