<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request) {
        // Validar las credenciales
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Redirigir al home después de iniciar sesión
            return redirect()->intended('home');
        }

        // Manejar error de autenticación
        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas son incorrectas.',
        ]);
    }
}