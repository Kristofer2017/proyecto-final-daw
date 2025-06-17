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
        return view('.citas.citas', ['citas' => $citas]);
    }

    public function create()
    {
        $doctores = $this->doctorModel->obtenerTodos();

        return view('citas.crear', ['doctores' => $doctores]);
    }

    public function store(Request $request)
    {
        try {
            $conflicto = $this->validarConflicto($request);

            if ($conflicto) {
                return redirect()->back()->with('error', 'Ya existe una cita programada con este doctor en ese horario.');
            }

            $cita = new Cita();
            $cita->notas = $request->notas;
            $cita->doctor_id = $request->doctor_id;
            $cita->fecha_programada = Carbon::parse($request->fecha_programada)->format('Y-m-d H:i:s');
            $cita->paciente_id = Auth::user()->perfilPaciente->paciente_id;

            $this->citaModel->crear($cita);

            
            return redirect()->route('citas.index')->with('success', 'Cita agendada con éxito!');
            
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Error al agendar la cita.');
        }
    }

    public function edit(string $id)
    {
        try {
            // Retorna el perfil del doctor, para obtener el usuario será desde la vista
            $doctores = $this->doctorModel->obtenerTodos();
            $cita = $this->citaModel->obtenerPorCitaId($id);

            return view('citas.editar', ['doctores' => $doctores, 'cita' => $cita]);
        } catch (\Throwable $th) {
            throw new HttpException(500, 'Error interno del servidor.');
        }
    }

    public function update(Request $request)
    {
        try {
            $conflicto = $this->validarConflicto($request);

            if ($conflicto) {
                return redirect()->back()->with('error', 'Ya existe una cita programada con este doctor en ese horario.');
            }
            $cita = $this->citaModel->obtenerPorCitaId($request->id);
            $cita->notas = $request->notas;
            $cita->doctor_id = $request->doctor_id;
            $cita->fecha_programada = Carbon::parse($request->fecha_programada)->format('Y-m-d H:i:s');
            
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

    public function validarConflicto($request){
        $inicio = Carbon::parse($request->fecha_programada);
        $fin = $inicio->copy()->addMinutes(30);

        $conflicto = Cita::where('doctor_id', $request->doctor_id)
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
