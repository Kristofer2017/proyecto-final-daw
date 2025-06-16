<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerfilController extends Controller
{
    public function index() {
        $usuario = Auth::user();

        if ($usuario->rol->nombre == "Doctor") {
            return view('perfil.doctor', ['usuario' => $usuario]);
        }
        return view('perfil.paciente', ['usuario' => $usuario]);
    }
}
