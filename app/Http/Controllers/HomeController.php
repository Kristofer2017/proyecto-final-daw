<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cita;
use App\Models\PerfilDoctor;
use App\Models\PerfilPaciente;
use App\Models\Seguro;
use App\Models\Usuario;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $totalCitas = Cita::count();
        $totalDoctores = PerfilDoctor::count();
        $totalSeguros = Seguro::count();
        $totalPacientes = PerfilPaciente::whereHas('usuario.rol', function($query) {
            $query->where('nombre', 'Paciente');
        })->count();
        // para este caso tuve que hacer una excepción ya que administrador tiene un perfil de paciente
        // igual que si se crearan mas roles, por defecto tendrian el perfil de paciente asociado, ya que este contiene el telefono y fecha de nacimiento, datos basicos y globales

        $datosDoctores = PerfilDoctor::with('usuario')->withCount('citas')->get();
        $doctores = $datosDoctores->pluck('usuario.nombre'); //nombres de doctores
        $citas = $datosDoctores->pluck('citas_count'); //citas por doctor

        // Conteo total por estado
        $estados = Cita::selectRaw('estado, COUNT(*) as total')
            ->groupBy('estado')
            ->pluck('total', 'estado');

        // Aseguramos que estén todos los estados, aunque alguno tenga 0
        $data = [
            'En Progreso' => $estados['En Progreso'] ?? 0,
            'Completada' => $estados['Completada'] ?? 0,
            'Cancelada' => $estados['Cancelada'] ?? 0,
        ];

        return view('home.index', 
        compact(
            'totalCitas', 
            'totalDoctores', 
            'totalPacientes', 
            'totalSeguros', 
            'doctores', 
            'citas',
            'data'
        ));
    }
}
