<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PerfilDoctor;
use App\Models\PerfilPaciente;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpKernel\Exception\HttpException;

class PerfilController extends Controller
{
    private $usuarioModel;
    private $pacienteModel;
    private $doctorModel;

    public function __construct() {
        $this->usuarioModel = new Usuario();
        $this->pacienteModel = new PerfilPaciente();
        $this->doctorModel = new PerfilDoctor();
    }

    public function index() {
        $usuario = Auth::user();

        if ($usuario->rol->nombre == "Doctor") {
            return view('perfil.doctor', ['usuario' => $usuario]);
        }
        return view('perfil.paciente', ['usuario' => $usuario]);
    }

    public function update(Request $request)
    {
        try {
            $usuario = $this->usuarioModel->obtenerPorUsuarioId($request->id);

            $usuario->nombre = $request->nombre;
            $usuario->apellido = $request->apellido;
            $usuario->email = $request->email;
            
            $this->usuarioModel->actualizar($usuario);

            if ($usuario->rol_id == 2) { // Doctor = rol_id 2
                $doctor = $usuario->perfilDoctor;
                $doctor->licencia = $request->licencia;
                $doctor->especialidad = $request->especialidad;
                $doctor->ubicacion = $request->ubicacion;

                $this->doctorModel->actualizar($doctor);
            } else {
                $paciente = $usuario->perfilPaciente;
                $paciente->telefono = $request->telefono;
                $paciente->fecha_nacimiento = $request->fecha_nacimiento;

                $this->pacienteModel->actualizar($paciente);
            }

            return redirect()->back()->with('success', 'Perfil actualizado correctamente');
            
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Error al actualizar perfil');
        }
    }

    public function destroy(Request $request){
        try {
            $id = Auth::user()->usuario_id;
            
            Auth::logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            $this->usuarioModel->eliminar($id);
            
            return redirect()->route('login');

        } catch (\Throwable $th) {
            throw new HttpException(500, 'Error interno del servidor.');
        }
    }
}
