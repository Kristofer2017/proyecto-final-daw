<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cita;
use App\Models\PerfilDoctor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpKernel\Exception\HttpException;

class CitaController extends Controller
{
    private $doctorModel;
    private $citaModel;

    public function __construct() {
        $this->doctorModel = new PerfilDoctor();
        $this->citaModel = new Cita();
    }

    public function index()
    {
        $citas = Auth::user()->perfilPaciente->citas;
        return view('/citas/citas', ['citas' => $citas]);
    }

    public function create()
    {
        // Retorna el perfil del doctor, para obtener el usuario será desde la vista
        $doctores = $this->doctorModel->obtenerTodos();

        return view('/citas/crear', ['doctores' => $doctores]);
    }

    public function store(Request $request)
    {
        try {
            $cita = new Cita();
            $cita->notas = $request->notas;
            $cita->doctor_id = $request->doctor;
            $cita->fecha_programada = Carbon::parse($request->fecha_programada)->format('Y-m-d H:i:s');
            $cita->paciente_id = Auth::user()->perfilPaciente->paciente_id;

            $this->citaModel->crear($cita);

            session_start();

            $_SESSION["response"] = [
                "success" => true,
                "message" => "Cita agendada con éxito!"
            ];

            return Redirect::route('citas.index');
            
        } catch (\Throwable $th) {
            dd($request->all(), Carbon::parse($request->fecha_programada)->format('Y-m-d H:i:s'),Auth::user()->perfilPaciente->paciente_id);
            
            //return Redirect::back()->with('error', 'Error al agendar la cita.');
        }
    }
}
