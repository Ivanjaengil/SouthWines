<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CursoController extends Controller
{
    public function index()
    {
        $cursos = Curso::where('estado', 'activo')->get();
        return view('cursos', compact('cursos'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        
        if ($request->hasFile('imagen')) {
            $data['imagen'] = $request->file('imagen')->store('cursos', 'public');
        }
        
        Curso::create($data);
        
        return redirect()->route('panel-administrador')->with('success', 'Curso creado exitosamente');
    }

    public function destroy(Curso $curso)
    {
        $curso->delete();
        return redirect()->route('panel-administrador')->with('success', 'Curso eliminado exitosamente');
    }

    public function update(Request $request, Curso $curso)
    {
        $data = $request->validate([
            'titulo' => 'required',
            'precio' => 'required|numeric',
            'duracion' => 'required|integer',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Manejo de la imagen
        if ($request->hasFile('imagen')) {
            // Eliminar la imagen anterior si existe
            if ($curso->imagen && Storage::disk('public')->exists($curso->imagen)) {
                Storage::disk('public')->delete($curso->imagen);
            }
            // Guardar la nueva imagen
            $data['imagen'] = $request->file('imagen')->store('cursos', 'public');
        } else {
            // Mantener la imagen existente si no se sube una nueva
            $data['imagen'] = $curso->imagen;
        }

        // Actualizar el curso
        $curso->update($data);

        return redirect()->route('panel-administrador')->with('success', 'Curso actualizado correctamente');
    }

    public function edit(Curso $curso)
    {
        $cursos = Curso::where('estado', 'activo')->get();
        return view('panel-administrador', compact('cursos', 'curso'));
    }

    public function show(Curso $curso)
    {
        // Verificar que el curso esté activo
        if ($curso->estado !== 'activo') {
            \Log::error('Curso no activo:', ['id' => $curso->id, 'estado' => $curso->estado]);
            abort(404);
        }
        
        try {
            // Redireccionar a la ruta específica según el título del curso
            switch (strtolower($curso->titulo)) {
                case 'iniciacion vinos':
                    return redirect()->route('iniciacion-vinos');
                
                case 'especialista en vinos':
                    return redirect()->route('especialista-vinos');
                
                case 'vinos internacionales':
                    return redirect()->route('vinos-internacionales');
                
                case 'cata de vinos':
                    return redirect()->route('cata-de-vinos');
                
                case 'especialista en vinos epumosos':
                    return redirect()->route('vinos-espumosos');
                
                default:
                    \Log::warning('Título no coincide con ningún caso:', ['titulo' => $curso->titulo]);
                    abort(404);
            }
        } catch (\Exception $e) {
            \Log::error('Error en show():', [
                'mensaje' => $e->getMessage(),
                'curso_id' => $curso->id,
                'curso_titulo' => $curso->titulo
            ]);
            abort(404);
        }
    }

    public function iniciacionVinos()
    {
        $curso = Curso::where('titulo', 'Iniciacion vinos')->firstOrFail();
        return view('iniciacion-vinos', compact('curso'));
    }

    public function especialistaVinos()
    {
        $curso = Curso::where('titulo', 'Especialista en vinos')->firstOrFail();
        return view('especialista-vinos', compact('curso'));
    }

    public function vinosInternacionales()
    {
        $curso = Curso::where('titulo', 'Vinos internacionales')->firstOrFail();
        return view('vinos-internacionales', compact('curso'));
    }

    public function cataVinos()
    {
        $curso = Curso::where('titulo', 'Cata de vinos')->firstOrFail();
        return view('cata-de-vinos', compact('curso'));
    }

    public function vinosEspumosos()
    {
        $curso = Curso::where('titulo', 'Especialista en vinos epumosos')->firstOrFail();
        return view('vinos-espumosos', compact('curso'));
    }
} 

