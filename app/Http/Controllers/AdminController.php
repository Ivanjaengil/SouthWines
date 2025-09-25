<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\User;
use App\Models\UsuarioPendiente;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:view admin panel');
    }

    public function index()
    {
        return view('panel-administrador');
    }

    public function estudiantes()
    {
        return view('panel-estudiantes');
    }

    public function estadisticas()
    {
        return view('panel-estadisticas');
    }

    public function configuracion()
    {
        return view('panel-configuracion');
    }

    public function panelAdministrador()
    {
        $cursos = Curso::all();
        return view('panel-administrador', ['cursos' => $cursos]);
    }




public function pendingUsers()
{
    $pendingUsers = UsuarioPendiente::where('estado', 'pendiente')->get();
    return view('admin.pending-users', ['pendingUsers' => $pendingUsers]);
}

public function approveUser($id)
{
    $pendingUser = UsuarioPendiente::findOrFail($id);
    
    User::create([
        'name' => $pendingUser->name,
        'email' => $pendingUser->email,
        'password' => $pendingUser->password, // Password is already hashed
    ]);
    
    $pendingUser->estado = 'aprobado';
    $pendingUser->save();
    
    return redirect()->back()->with('success', 'Usuario aprobado correctamente');
}

public function rejectUser($id)
{
    $pendingUser = UsuarioPendiente::findOrFail($id);
    $pendingUser->estado = 'rechazado';
    $pendingUser->save();
    
    return redirect()->back()->with('success', 'Usuario rechazado');
}
}