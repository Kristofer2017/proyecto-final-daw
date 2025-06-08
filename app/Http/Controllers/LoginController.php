<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpKernel\Exception\HttpException;

class LoginController extends Controller
{
    public function index() {
        return view('/auth/login');
    }
    
    public function login(Request $request) {
        try {
            $credenciales = [
                'email' => $request->email,
                'password' => $request->password
            ];

            if (Auth::attempt($credenciales)) {
                $request->session()->regenerate();

                return redirect()->intended('/roles');
                
            } else {
                return back()->with('error', 'Credenciales incorrectas');
            }
        } catch (\Throwable $th) {
            echo var_dump($th);
        }
    }

    public function logout(Request $request) {
        try {
            Auth::logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect('/auth/login');

        } catch (\Throwable $th) {
            throw new HttpException(500, 'Error interno del servidor.');
        }
    }
}
