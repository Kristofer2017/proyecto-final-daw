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
        $totalPacientes = PerfilPaciente::count();
        $totalSeguros = Seguro::count();

        return view('home.index', compact('totalCitas', 'totalDoctores', 'totalPacientes', 'totalSeguros'));
    }
}
