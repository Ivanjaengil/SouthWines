<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class EstudiantesController extends Controller
{
    public function index()
    {
        $estudiantes = null;
        
        try {
            $estudiantes = User::where('role', 'estudiante')->get();
            
            if (config('app.debug')) {
                \Log::info('Estudiantes query result:', ['count' => $estudiantes->count()]);
            }
            
            // Changed view name to match Laravel convention
            return view('estudiantes.index', ['estudiantes' => $estudiantes]);
        } catch (\Exception $e) {
            \Log::error('Error loading estudiantes: ' . $e->getMessage());
            return back()->with('error', 'Error al cargar estudiantes');
        }
    }
}
