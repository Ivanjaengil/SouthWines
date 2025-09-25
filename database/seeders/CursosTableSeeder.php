<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Curso;

class CursosTableSeeder extends Seeder
{
    /**
     
Run the database seeds.*/
  public function run(): void{

        Curso::firstOrCreate([
            'id' => '1',
            'titulo' => 'Iniciacion vinos',
            'precio' => '260',
            'duracion' => '30',
            'estado' => 'activo',
        ]);

        Curso::firstOrCreate([
            'id' => '2',
            'titulo' => 'Especialista en vinos',
            'precio' => '140',
            'duracion' => '20',
            'estado' => 'activo',
        ]);

        Curso::firstOrCreate([
            'id' => '3',
            'titulo' => 'Vinos internacionales',
            'precio' => '140',
            'duracion' => '10',
            'estado' => 'activo',
        ]);

        Curso::firstOrCreate([
            'id' => '4',
            'titulo' => 'Cata de Vinos',
            'precio' => '140',
            'duracion' => '10',
            'estado' => 'activo',
        ]);

        Curso::firstOrCreate([
            'id' => '5',
            'titulo' => 'Especialista en vinos epumosos',
            'precio' => '140',
            'duracion' => '10',
            'estado' => 'activo',
        ]);
    }
}