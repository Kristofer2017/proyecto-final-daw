<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RolMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $usuario = Auth::user();

        if ($usuario->rol->nombre === 'Doctor') {
            return $next($request);
        }

        return response()->view('errors.unauthorized', [
            'mensaje' => 'No tienes permiso para acceder a esta sección.'
        ]);
    }
}
