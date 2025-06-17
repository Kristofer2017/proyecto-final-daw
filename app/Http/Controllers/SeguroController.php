<?php

namespace App\Http\Controllers;

use App\Models\Seguro;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SeguroController extends Controller
{
    private $seguroModel;
    public function __construct() {
        $this->seguroModel = new Seguro();
    }

    public function index()
    {
        $seguros = $this->seguroModel->obtenertodos();
        return view('seguros.doctor.seguros', ['seguros' => $seguros]);
    }

    public function create()
    {
        return view('seguros.doctor.crear');
    }

    public function store(Request $request)
    {
        try {
            $seguro = new Seguro();

            $seguro->fecha_creacion = now();
            $seguro->activo = $request->activo;
            $seguro->nombre = $request->nombre;
            $seguro->telefono = $request->telefono;
            

            $this->seguroModel->crear($seguro);

            return redirect()->route('seguros.index')->with('success', 'Seguro fué guardado correctamente!');
            
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Error al guardar seguro.');
        }
    }
    
    public function edit(string $id)
    {
        $seguro = $this->seguroModel->obtenerPorSeguroId($id);
        return view('seguros.doctor.editar', ['seguro' => $seguro]);
    }

    public function update(Request $request)
    {
        try {
            $seguro = $this->seguroModel->obtenerPorSeguroId($request->id);

            $seguro->activo = $request->activo;
            $seguro->nombre = $request->nombre;
            $seguro->telefono = $request->telefono;
            
            $this->seguroModel->actualizar($seguro);

            return redirect()->route('seguros.index')->with('success', 'Seguro actualizado correctamente');
            
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Error al actualizar seguro.');
        }
    }

    public function destroy(string $id)
    {
        try {
            $this->seguroModel->eliminar($id);

            return redirect()->route('seguros.index')->with('success', 'Datos Eliminados');
            
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Error al eliminar seguro.');
        }
    }
}
