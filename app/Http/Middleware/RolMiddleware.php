<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RolMiddleware
{
    public function handle(Request $request, Closure $next, $modo): Response
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $esAdmin = Auth::user()->rol->nombre == 'Administrador';

        // Modo: permitir solo a administradores
        if ($modo === 'permitir' && !$esAdmin) {
            return response()->view('errors.unauthorized', ['mensaje' => 'No tienes permiso para acceder a esta sección.']);
        }

        // Modo: negar a administradores
        if ($modo === 'negar' && $esAdmin) {
            return response()->view('errors.unauthorized', ['mensaje' => 'No tienes permiso para acceder a esta sección.']);
        }

        return $next($request);
    }
}
