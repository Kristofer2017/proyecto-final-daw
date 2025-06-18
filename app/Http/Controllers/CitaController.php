<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cita;
use App\Models\PerfilDoctor;
use App\Models\PerfilPaciente;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpKernel\Exception\HttpException;

class CitaController extends Controller
{
    private $doctorModel;
    private $pacienteModel;
    private $citaModel;
    private $esDoctor;

    public function __construct() {
        $this->doctorModel = new PerfilDoctor();
        $this->pacienteModel = new PerfilPaciente();
        $this->citaModel = new Cita();
        $this->esDoctor = Auth::user()->rol_id == 2; // Doctor = rol_id 2
    }

    public function index()
    {
        if($this->esDoctor) {
            $citas = Auth::user()->perfilDoctor->citas;
            return view('citas.doctor.citas', ['citas' => $citas]);
        } else {
            $citas = Auth::user()->perfilPaciente->citas;
            return view('citas.paciente.citas', ['citas' => $citas]);
        }
    }

    public function create()
    {
        if($this->esDoctor) {
            $pacientes = $this->pacienteModel->obtenerTodos();
            return view('citas.doctor.crear', ['pacientes' => $pacientes]);
        } else {
            $doctores = $this->doctorModel->obtenerTodos();
            return view('citas.paciente.crear', ['doctores' => $doctores]);
        }
    }

    public function store(Request $request)
    {
        try {
            $fecha_programada = Carbon::parse($request->fecha_programada);
            
            if($this->esDoctor) {
                $doctor_id = Auth::user()->perfilDoctor->doctor_id;
                $paciente_id = $request->paciente_id;
            } else {
                $paciente_id = Auth::user()->perfilPaciente->paciente_id;
                $doctor_id = $request->doctor_id;
            }
            
            $conflicto = $this->validarConflicto($fecha_programada, $doctor_id);

            if ($conflicto) {
                return redirect()->back()->with('error', 'Ya existe una cita programada con este doctor en ese horario.');
            }

            $cita = new Cita();

            $cita->doctor_id = $doctor_id;
            $cita->paciente_id = $paciente_id;
            $cita->fecha_programada = $fecha_programada;
            $cita->notas = $request->notas;

            $this->citaModel->crear($cita);
            
            return redirect()->route('citas.index')->with('success', 'Cita agendada con éxito!');
            
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Error al agendar la cita.');
        }
    }

    public function edit(string $id)
    {
        try {
            $cita = $this->citaModel->obtenerPorCitaId($id);

            if($this->esDoctor) {
                $pacientes = $this->pacienteModel->obtenerTodos();
                return view('citas.doctor.editar', ['pacientes' => $pacientes, 'cita' => $cita]);
            } else {
                $doctores = $this->doctorModel->obtenerTodos();
                return view('citas.paciente.editar', ['doctores' => $doctores, 'cita' => $cita]);
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Ha ocurrido un error, intenta más tarde.');
        }
    }

    public function update(Request $request)
    {
        try {
            $fecha_programada = Carbon::parse($request->fecha_programada);
            
            if($this->esDoctor) {
                $doctor_id = Auth::user()->perfilDoctor->doctor_id;
                $paciente_id = $request->paciente_id;
            } else {
                $paciente_id = Auth::user()->perfilPaciente->paciente_id;
                $doctor_id = $request->doctor_id;
            }
            
            $conflicto = $this->validarConflicto($fecha_programada, $doctor_id);

            if ($conflicto) {
                return redirect()->back()->with('error', 'Ya existe una cita programada con este doctor en ese horario.');
            }

            $cita = $this->citaModel->obtenerPorCitaId($request->id);

            $cita->doctor_id = $doctor_id;
            $cita->paciente_id = $paciente_id;
            $cita->fecha_programada = $fecha_programada;
            $cita->notas = $request->notas;
            
            $this->citaModel->actualizar($cita);
            
            return redirect()->route('citas.index')->with('success', 'Su cita ha sido reprogramada');
            
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Error al reprogramar la cita.');
        }
    }

    public function cancel(string $id)
    {
        try {
            $cita = $this->citaModel->obtenerPorCitaId($id);

            $cita->estado = 'Cancelada';

            $this->citaModel->actualizar($cita);

            return redirect()->route('citas.index')->with('success', 'La cita fue cancelada exitosamente.');

        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Error al cancelar cita');
        }
    }

    public function complete(string $id)
    {
        try {
            if($this->esDoctor) {
                $cita = $this->citaModel->obtenerPorCitaId($id);

                $cita->estado = 'Completada';

                $this->citaModel->actualizar($cita);

                return redirect()->route('citas.index')->with('success', '¡La cita fue completada!');
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Error al cancelar cita');
        }
    }

    public function validarConflicto($fecha_programada, $doctor_id){
        $inicio = $fecha_programada;
        $fin = $inicio->copy()->addMinutes(30);

        $conflicto = Cita::where('doctor_id', $doctor_id)
            ->whereNotIn('estado', ['Cancelada', 'Completada'])
            ->where(function ($query) use ($inicio, $fin) {
                $query->whereBetween('fecha_programada', [$inicio, $fin])
                    ->orWhere(function ($q) use ($inicio, $fin) {
                        // Por si otra cita empieza antes pero invade el bloque
                        $q->where('fecha_programada', '<', $inicio)
                            ->whereRaw('DATE_ADD(fecha_programada, INTERVAL 30 MINUTE) > ?', [$inicio]);
                    });
            })->exists();

        return $conflicto;
    }
}
