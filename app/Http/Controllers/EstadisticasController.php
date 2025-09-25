<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Curso;
use App\Models\Inscripcion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class EstadisticasController extends Controller
{
    public function index()
    {
        return view('panel-estadisticas');
    }

    public function getDatos()
    {
        try {
            // Total de estudiantes (usuarios con role 'estudiante')
            $totalEstudiantes = User::where('role', 'estudiante')
                ->count();

            // Total de cursos activos de la tabla 'cursos'
            $totalCursos = Curso::where('estado', 'activo')
                ->count();

            // Inscripciones del mes actual
            $inscripcionesMes = 0; // Temporalmente en 0

            // Usuarios pendientes de la tabla 'usuarios_pendientes'
            $usuariosPendientes = DB::table('usuarios_pendientes')
                ->where('estado', 'pendiente')
                ->count();

            // Agregar logging para debug
            Log::info('Estadísticas:', [
                'estudiantes' => $totalEstudiantes,
                'cursos' => $totalCursos,
                'inscripciones' => $inscripcionesMes,
                'pendientes' => $usuariosPendientes
            ]);

            $datos = [
                'totalEstudiantes' => $totalEstudiantes,
                'totalCursos' => $totalCursos,
                'inscripcionesMes' => $inscripcionesMes,
                'usuariosPendientes' => $usuariosPendientes
            ];

            return response()->json($datos);
        } catch (\Exception $e) {
            Log::error('Error en getDatos: ' . $e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
} 