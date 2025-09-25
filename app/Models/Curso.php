<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    protected $table = 'cursos';

    // Campos que se pueden asignar masivamente
    protected $fillable = [
        'titulo',
        'descripcion',
        'precio',
        'duracion',
        'activo',
        'imagen'
    ];

    // Campos que deben ser tratados como fechas (opcional)
    protected $dates = [
        'created_at',
        'updated_at'
    ];
}
