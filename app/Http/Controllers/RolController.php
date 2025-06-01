<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpKernel\Exception\HttpException;

class RolController extends Controller
{
    private $rolModel;

    public function __construct() {
        $this->rolModel = new Rol();
    }

    public function index()
    {
        try {

            $roles = $this->rolModel->obtenerTodos();
            return view('/roles/roles', ["roles" => $roles]);

        } catch (\Exception $e) {
            
            throw new HttpException(500, 'Error interno del servidor.');
        }
    }

    public function create()
    {
        return view('/roles/crear');
    }

    public function store(Request $request)
    {
        try {
            // datos enviados del formulario 
            // de creacion

            $newRol = new Rol();

            $newRol->fecha_creacion = now();
            $newRol->activo = $request->activo;
            $newRol->nombre = $request->nombre;

            $this->rolModel->crear($newRol);

            session_start();

            $_SESSION["response"] = [
                "success" => true,
                "message" => "Datos guardados"
            ];

            return Redirect::route('roles.index');

        } catch (\Exception $e) {
            
            throw new HttpException(500, 'Error interno del servidor.');
        }
    }

    public function show(string $id)
    {
        // para mostrar el detalle de un registro
    }

    public function edit(int $id)
    {
        try {
            // para redirigir al formulario
            // de edicion
            
            $rol = $this->rolModel->obtenerPorRolId($id);

            return view('/roles/editar', [ "rol" => $rol ]);
        
        } catch (\Exception $e) {
            
            throw new HttpException(500, 'Error interno del servidor.');
        }
    }

    public function update(Request $request)
    {
        try {
            // datos enviados del formulario 
            // de edicion

            $rol = $this->rolModel->obtenerPorRolId($request->id);
            $rol->activo = $request->activo;
            $rol->nombre = $request->nombre;

            $this->rolModel->actualizar($rol);

            session_start();
            
            $_SESSION["response"] = [
                "success" => true,
                "message" => "Datos actualizados"
            ];

            return Redirect::route('roles.index');
        
        } catch (\Exception $e) {
            
            throw new HttpException(500, 'Error interno del servidor.');
        }
    }

    public function destroy(int $id)
    {
        try {
            $this->rolModel->eliminarPorRolId($id);

            session_start();
            
            $_SESSION["response"] = [
                "success" => true,
                "message" => "Datos eliminados"
            ];

            return Redirect::route('roles.index');

        } catch (\Exception $e) {
        
            throw new HttpException(500, 'Error interno del servidor.');
        }
    }
}
