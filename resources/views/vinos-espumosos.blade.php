<!DOCTYPE html>
<html>
<head>
    <title>South Wines</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/vinos-espumosos.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}?v=1.1">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="{{ asset('js/scripts.js') }}?v=1.1"></script>
    <script src="{{ asset('js/support-widget.js') }}?v=1.0"></script>
</head>
<body>
    
@include('partials.header')


<main class="curso-container">
    <section class="curso-intro">
        <div class="curso-intro__content">
            <h1>Curso de Vinos Espumosos</h1>
            <p class="curso-intro__descripcion">
                Curso especializado en vinos espumosos, conocimientos de elaboración y cata de los diferentes espumosos.
            </p>
        </div>
        <div class="curso-intro__imagen">
            <img src="{{ asset('img/imagen-curso-iniciacion.png') }}" 
                 alt="Curso de vinos internacionales" 
                 onerror="this.onerror=null; this.src='{{ asset('img/default-wine-image.png') }}';">
        </div>
    </section>


    <section class="curso-info">
        <div class="curso-info__container">
            <h2>Descripción del Curso</h2>
            <p>Curso de especialización en la descripción de los diferentes procesos y técnicas para la elaboración de los vinos espumosos de todo el mundo, en este curso veremos los diferentes espumoso sus características principales, así como sus diferencias a nivel técnico y analítico. Daremos un giro a las principales regiones productoras de espumosos con sus variedades de uvas y técnicas de vinificación y viticultura de la zona.</p>
            
            <div class="curso-info__detalles">
                <h3>Estructura del Curso</h3>
                <ul>
                    <li>Curso presencial de 10 horas</li>
                    <li>2 sesiones de 5 horas cada una</li>
                    <li>12 plazas disponibles</li>
                </ul>
            </div>

            <div class="curso-info__contenido">
                <h3>Contenidos del Curso</h3>
                <ul>
                    <li>Breve introducción e historia de los vinos espumosos</li>
                    <li>La vinificación y principales variedades para los espumosos</li>
                    <li>El método tradicional</li>
                    <li>Otros métodos</li>
                    <li>Principales regiones de los espumosos</li>
                    <li>Cata sistemática de los espumosos</li>
                    <li>Maridajes</li>
                </ul>
            </div>

            <div class="curso-info__materiales">
                <h3>Materiales Incluidos</h3>
                <p>Se entregará al inicio del curso:</p>
                <ul>
                    <li>Materiales didácticos sobre la información más importante del curso</li>
                    <li>Fichas de cata profesionales</li>
                </ul>
            </div>

            <div class="curso-info__inscripcion">
                    <a href="{{ route('purchase.create', $curso) }}" class="btn-inscripcion">Inscríbete Ahora</a>
                </div>
        </div>
    </section>
</main>

<div id="support-widget" class="support-widget">
        <button class="support-widget__toggle">
            <i class="fas fa-headset"></i>
        </button>
        <div class="support-widget__panel">
            <h3>Contacta con Soporte</h3>
            <form id="support-form">
                <input type="text" name="name" placeholder="Nombre" required>
                <input type="email" name="email" placeholder="Email" required>
                <textarea name="message" placeholder="¿En qué podemos ayudarte?" required></textarea>
                <button type="submit">Enviar</button>
            </form>
        </div>
    </div>

</body>
</html> 