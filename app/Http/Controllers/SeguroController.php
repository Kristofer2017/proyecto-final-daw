<?php

namespace App\Http\Controllers;

use App\Models\Seguro;
use App\Http\Controllers\Controller;
use App\Models\PacienteSeguro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SeguroController extends Controller
{
    private $seguroModel;
    private $seguroPacienteModel;
    private $esDoctor;

    public function __construct() {
        $this->seguroModel = new Seguro();
        $this->seguroPacienteModel = new PacienteSeguro();
        $this->esDoctor = Auth::user()->rol_id == 2; // Doctor = rol_id 2
    }

    public function index()
    {
        if($this->esDoctor) {
            $seguros = $this->seguroModel->obtenertodos();
            return view('seguros.doctor.seguros', ['seguros' => $seguros]);
        } else {
            $paciente = Auth::user()->perfilPaciente;
            $seguros = $paciente->seguros;

            return view('seguros.paciente.seguros', ['seguros' => $seguros]);
        }
    }

    public function create()
    {
        if($this->esDoctor) {
            return view('seguros.doctor.crear');
        } else {
            $seguros = $this->seguroModel->obtenertodos();
            return view('seguros.paciente.crear', ['seguros' => $seguros]);
        }
    }

    public function store(Request $request)
    {
        try {
            if($this->esDoctor) {
                $seguro = new Seguro();

                $seguro->fecha_creacion = now();
                $seguro->activo = $request->activo;
                $seguro->nombre = $request->nombre;
                $seguro->telefono = $request->telefono;
                

                $this->seguroModel->crear($seguro);
            } else {
                $paciente = Auth::user()->perfilPaciente;
                $seguroPaciente = new PacienteSeguro();

                $seguroPaciente->paciente_id = $paciente->paciente_id;
                $seguroPaciente->seguro_id = $request->seguro_id;
                $seguroPaciente->tipo_plan = $request->tipo_plan;
                $seguroPaciente->numero_seguro = $request->numero_seguro;
                $seguroPaciente->activo = $request->activo;

                $this->seguroPacienteModel->crear($seguroPaciente);
            }
            
            return redirect()->route('seguros.index')->with('success', 'Seguro fué guardado correctamente!');
            
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Error al guardar seguro.');
        }
    }
    
    public function edit(string $id)
    {
        try {
            if($this->esDoctor) {
                $seguro = $this->seguroModel->obtenerPorSeguroId($id);
                return view('seguros.doctor.editar', ['seguro' => $seguro]);
            }else{
                $paciente = Auth::user()->perfilPaciente;
                $segurosDisponibles = $this->seguroModel->obtenertodos();
                $seguroPaciente = $this->seguroPacienteModel->obtenerSeguroPaciente($id, $paciente->paciente_id);

                return view('seguros.paciente.editar', 
                ['segurosDisponibles' => $segurosDisponibles, 'seguroPaciente' => $seguroPaciente]);
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Error al actualizar seguro.');
        }
    }

    public function update(Request $request)
    {
        try {
            if($this->esDoctor) {
                $seguro = $this->seguroModel->obtenerPorSeguroId($request->id);

                $seguro->activo = $request->activo;
                $seguro->nombre = $request->nombre;
                $seguro->telefono = $request->telefono;
                
                $this->seguroModel->actualizar($seguro);
            } else {
                $paciente = Auth::user()->perfilPaciente;
                $seguroPaciente = $this->seguroPacienteModel->obtenerSeguroPaciente($request->id, $paciente->paciente_id);

                $seguroPaciente->seguro_id = $request->seguro_id;
                $seguroPaciente->tipo_plan = $request->tipo_plan;
                $seguroPaciente->numero_seguro = $request->numero_seguro;
                $seguroPaciente->activo = $request->activo;

                $this->seguroPacienteModel->actualizar($seguroPaciente);
            }

            return redirect()->route('seguros.index')->with('success', 'Seguro actualizado correctamente');
            
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Error al actualizar seguro.');
        }
    }

    public function destroy(string $id)
    {
        try {
            if($this->esDoctor) {
                $this->seguroModel->eliminar($id);
            } else {
                $this->seguroPacienteModel->eliminar($id);
            }

            return redirect()->route('seguros.index')->with('success', 'Datos Eliminados');
            
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Error al eliminar seguro.');
        }
    }
}
