<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cursos</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/cursos.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset('js/scripts.js') }}?v=1.1"></script>
    <script src="support-widqet.js"></script>
</head>
<body>
    
    @include('partials.header')
    
    <main class="main-content">
        <h1>Nuestros Cursos</h1>
        <div class="cursos-container">
            @foreach($cursos as $curso)
                <div class="curso-card">
                    <img src="{{ asset('storage/' . $curso->imagen) }}" alt="{{ $curso->titulo }}" class="curso-logo">
                    <h2>{{ $curso->titulo }}</h2>
                    <p>{{ $curso->descripcion }}</p>
                    <div class="curso-info">
                        <span>Precio: {{ $curso->precio }}€</span>
                        @if($curso->duracion)
                            <span>Duración: {{ $curso->duracion }} horas</span>
                        @endif
                    </div>
                    <a href="{{ route('curso.detalle', $curso) }}" class="btn btn-primary">Más Información</a>
                </div>
            @endforeach
        </div>
    </main>

 
    <footer class="footer">
    </footer>
</body>
</html