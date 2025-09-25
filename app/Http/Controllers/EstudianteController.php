<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UsuarioPendiente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EstudianteController extends Controller
{

public function index()
{
    $estudiantes = User::where('role', 'estudiante')->get();
    $usuariosPendientes = UsuarioPendiente::all();
    return view('panel-estudiantes', compact('estudiantes', 'usuariosPendientes'));
}


    public function aprobar($id)
    {
        $pendiente = UsuarioPendiente::findOrFail($id);
        
        // Crear nuevo usuario
        $user = new User();
        $user->name = $pendiente->name;
        $user->email = $pendiente->email;
        $user->password = $pendiente->password;
        $user->save();

        // Eliminar usuario pendiente
        $pendiente->delete();

        return redirect()->route('panel-estudiantes')
            ->with('success', 'Usuario aprobado correctamente');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'phone' => 'nullable|string',
        ]);

        $estudiante = User::findOrFail($id);
        $estudiante->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        return response()->json([
            'success' => 'Estudiante actualizado correctamente',
            'estudiante' => $estudiante
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'phone' => 'nullable|string',
            'password' => [
                'required',
                'string',
                'min:7',
                'regex:/[A-Z]/', 
            ]
        ], [
            'password.regex' => 'La contraseña debe contener al menos una mayúscula.',
            'password.min' => 'La contraseña debe tener al menos 7 caracteres.'
        ]);

        $estudiante = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password)
        ]);

        return response()->json([
            'success' => 'Estudiante creado correctamente',
            'estudiante' => $estudiante
        ]);
    }

    public function destroy($id)
    {
        $estudiante = User::findOrFail($id);
        $estudiante->delete();

        return response()->json(['success' => 'Estudiante eliminado correctamente']);
    }
}