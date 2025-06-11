<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PerfilPaciente;
use App\Models\Rol;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpKernel\Exception\HttpException;

class RegisterController extends Controller
{
    private $rolModel;
    private $usuarioModel;
    private $pacienteModel;

    public function __construct() {
        $this->rolModel = new Rol();
        $this->usuarioModel = new Usuario();
        $this->pacienteModel = new PerfilPaciente();
    }

    public function index() {
        $roles = $this->rolModel->obtenerTodos();
        return view('/auth/registro', ['roles' => $roles]);
    }

    public function register(Request $request) {
        $request->validate([
            'password' => 'confirmed|min:4',
            'telefono' => 'max:10',
        ]);

        try {
            $usuario = new Usuario();
            $usuario->fecha_creacion = now();
            $usuario->nombre = $request->nombre;
            $usuario->apellido = $request->apellido;
            $usuario->email = $request->email;
            $usuario->password = Hash::make($request->password);
            $usuario->rol_id = $request->rol_id;

            $usuarioCreado = $this->usuarioModel->crear($usuario);

            $paciente = new PerfilPaciente();
            $paciente->fecha_nacimiento = $request->fecha_nacimiento;
            $paciente->telefono = $request->telefono;
            $paciente->usuario_id = $usuarioCreado->usuario_id;

            $this->pacienteModel->crear($paciente);

            return redirect()->route('login')->with('success', 'Registro realizado correctamente');

        } catch (\Throwable $th) {
            throw new HttpException(500, 'Error interno del servidor.');
        }
    }
}
