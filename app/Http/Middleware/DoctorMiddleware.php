<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class DoctorMiddleware
{
    public function handle(Request $request, Closure $next, $modo): Response
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $esDoctor = Auth::user()->rol->nombre == 'Doctor';

        // Modo: permitir solo a administradores
        if ($modo === 'permitir' && !$esDoctor) {
            return response()->view('errors.unauthorized', ['mensaje' => 'No tienes permiso para acceder a esta sección.']);
        }

        // Modo: negar a administradores
        if ($modo === 'negar' && $esDoctor) {
            return response()->view('errors.unauthorized', ['mensaje' => 'No tienes permiso para acceder a esta sección.']);
        }

        return $next($request);
    }
}
