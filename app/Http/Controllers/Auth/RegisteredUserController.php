<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\UsuarioPendiente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)  // Changed from 'register' to 'store'
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:usuarios_pendientes',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $usuarioPendiente = new UsuarioPendiente();
        $usuarioPendiente->name = $validated['name'];
        $usuarioPendiente->email = $validated['email'];
        $usuarioPendiente->password = Hash::make($validated['password']);
        $usuarioPendiente->estado = 'pendiente';
        $usuarioPendiente->save();

        return redirect()->route('login')
            ->with('status', 'Tu registro está pendiente de aprobación por un administrador.');
    }
}