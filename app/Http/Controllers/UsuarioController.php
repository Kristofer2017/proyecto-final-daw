<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PerfilDoctor;
use App\Models\PerfilPaciente;
use App\Models\Usuario;
use App\Models\Rol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpKernel\Exception\HttpException;

class UsuarioController extends Controller
{
    private $usuarioModel;
    private $pacienteModel;
    private $doctorModel;
    private $rolModel;

    public function __construct() {
        $this->usuarioModel = new Usuario();
        $this->pacienteModel = new PerfilPaciente();
        $this->doctorModel = new PerfilDoctor();
        $this->rolModel = new Rol();
    }

    public function index()
    {
        $usuarios = $this->usuarioModel->obtenerTodos()->where('rol_id', '!=', 3);
        return view('/usuarios/usuarios', ['usuarios' => $usuarios]);
    }

    public function create()
    {
        $roles = $this->rolModel->obtenerTodos();
        return view('/usuarios/crear', ['roles' => $roles]);
    }

    public function store(Request $request)
    {
        try {
            $usuario = new Usuario();
            $usuario->fecha_creacion = now();
            $usuario->nombre = $request->nombre;
            $usuario->apellido = $request->apellido;
            $usuario->email = $request->email;
            $usuario->password = Hash::make($request->password);
            $usuario->rol_id = $request->rol_id;

            $usuarioCreado = $this->usuarioModel->crear($usuario);

            if($request->rol_id == 2){
                $doctor = new PerfilDoctor();
                $doctor->licencia = $request->licencia;
                $doctor->especialidad = $request->especialidad;
                $doctor->ubicacion = $request->ubicacion;
                $doctor->usuario_id = $usuarioCreado->usuario_id;

                $this->doctorModel->crear($doctor);
            }else{
                $paciente = new PerfilPaciente();
                $paciente->fecha_nacimiento = $request->fecha_nacimiento;
                $paciente->telefono = $request->telefono;
                $paciente->usuario_id = $usuarioCreado->usuario_id;

                $this->pacienteModel->crear($paciente);
            }
            
            return redirect('/usuarios')->with('success', 'Usuario guardado correctamente');

        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() == '23000') { // código SQL para violación de UNIQUE
                return back()->with('error', 'Ya existe un usuario con el correo electrónico ingresado.');
            }
        }catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Error al guardar usuario.');
        }
    }

    public function edit(string $id)
    {
        try {
            $roles = $this->rolModel->obtenerTodos();
            $usuario = $this->usuarioModel->obtenerPorUsuarioId($id);

            return view('usuarios.editar', ['usuario' => $usuario, 'roles' => $roles]);
        
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Error al editar dato');
        }
    }

    public function update(Request $request)
    {
        try {
            $usuario = $this->usuarioModel->obtenerPorUsuarioId($request->id);

            $usuario->activo = $request->activo;
            $usuario->nombre = $request->nombre;
            $usuario->apellido = $request->apellido;
            $usuario->email = $request->email;
            $usuario->rol_id = $request->rol_id;

            if ($request->filled('password')) {
                $usuario->password = Hash::make($request->password);
            }

            $usuario = $this->usuarioModel->actualizar($usuario);

            if ($request->rol_id == 2) { // Doctor

                // Eliminar perfil paciente si existe
                if ($usuario->perfilPaciente) {
                    $usuario->perfilPaciente->delete();
                }

                // Crear o actualizar perfil doctor, si el perfil no existe, crea un nuevo perfil
                $perfil = $usuario->perfilDoctor ?? new PerfilDoctor();
                $perfil->licencia = $request->licencia;
                $perfil->especialidad = $request->especialidad;
                $perfil->ubicacion = $request->ubicacion;
                $perfil->usuario_id = $usuario->usuario_id;
                $perfil->save();

            } else { // Paciente (Administrador u cualquier otro rol, ya que usan el mismo tipo de perfil)

                // Eliminar perfil doctor si existe
                if ($usuario->perfilDoctor) {
                    $usuario->perfilDoctor->delete();
                }

                // Crear o actualizar perfil paciente, si el perfil no existe, crea un nuevo perfil
                $perfil = $usuario->perfilPaciente ?? new PerfilPaciente();
                $perfil->fecha_nacimiento = $request->fecha_nacimiento;
                $perfil->telefono = $request->telefono;
                $perfil->usuario_id = $usuario->usuario_id;
                $perfil->save();
            }

            return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado con éxito!');
            
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Error al actualizar usuario');
        }
    }

    public function destroy(string $id)
    {
        try {
            $this->usuarioModel->eliminar($id);

            return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado');

        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Error al eliminar dato');
        }
    }
}
