<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PerfilPaciente;
use Illuminate\Http\Request;

class PacientesController extends Controller
{
    private $pacienteModel;

    public function __construct() {
        $this->pacienteModel = new PerfilPaciente();
    }

    public function index() {
        $pacientes = $this->pacienteModel->obtenerTodos();
        return view('pacientes.pacientes', ['pacientes' => $pacientes]);
    }

    public function shedule(string $id) {
        $pacientes = $this->pacienteModel->obtenerTodos();
        return view ('pacientes.agendar', ['id' => $id, 'pacientes' => $pacientes]);
    }
}
