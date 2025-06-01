<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use App\Models\Rol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

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
            $usuario->nombre = $request->apellido;
            $usuario->nombre = $request->correo;
            $usuario->password = Hash::make($request->contra);
            $usuario->rol_id = $request->rol_id;

            $this->usuarioModel->crear($usuario);

            session_start();

            $_SESSION["response"] = [
                "success" => true,
                "message" => "Datos guardados"
            ];

            return Redirect::route('usuarios.index');
            
        } catch (\Throwable $th) {
            echo var_dump($th);
        }
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
