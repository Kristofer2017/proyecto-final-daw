<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use App\Models\Rol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpKernel\Exception\HttpException;

class UsuarioController extends Controller
{
    private $usuarioModel;
    private $rolModel;

    public function __construct() {
        $this->usuarioModel = new Usuario();
        $this->rolModel = new Rol();
    }

    public function index()
    {
        $usuarios = $this->usuarioModel->obtenerTodos();
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
            $usuario->activo = $request->activo;
            $usuario->nombre = $request->nombre;
            $usuario->apellido = $request->apellido;
            $usuario->email = $request->email;
            $usuario->password = Hash::make($request->password);
            $usuario->rol_id = $request->rol_id;

            $this->usuarioModel->crear($usuario);

            session_start();

            $_SESSION["response"] = [
                "success" => true,
                "message" => "Usuario guardado con éxito!"
            ];

            return Redirect::route('usuarios.index');
            
        } catch (\Throwable $th) {
            throw new HttpException(500, 'Error interno del servidor.');
        }
    }

    public function edit(string $id)
    {
        try {
            $roles = $this->rolModel->obtenerTodos();
            $usuario = $this->usuarioModel->obtenerPorUsuarioId($id);

            return view('/usuarios/editar', ['usuario' => $usuario, 'roles' => $roles]);
        
        } catch (\Throwable $th) {
            throw new HttpException(500, 'Error interno del servidor.');
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
            $usuario->password = Hash::make($request->password);
            $usuario->rol_id = $request->rol_id;

            $this->usuarioModel->actualizar($usuario);

            session_start();

            $_SESSION["response"] = [
                "success" => true,
                "message" => "Usuario actualizado con éxito!"
            ];

            return Redirect::route('usuarios.index');
            
        } catch (\Throwable $th) {
            throw new HttpException(500, 'Error interno del servidor.');
        }
    }

    public function destroy(string $id)
    {
        try {
            $this->usuarioModel->eliminar($id);

            session_start();

            $_SESSION["response"] = [
                "success" => true,
                "message" => "Datos eliminados"
            ];
            
            return Redirect::route('usuarios.index');

        } catch (\Throwable $th) {
            throw new HttpException(500, 'Error interno del servidor.');
        }
    }
}
