<!DOCTYPE html>
<html>
<head>
    <title>South Wines</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/curso-especialista.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}?v=1.1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <script src="{{ asset('js/scripts.js') }}?v=1.1"></script>
    <script src="{{ asset('js/support-widget.js') }}?v=1.0"></script>
    
</head>
<body>
    @include('partials.header')

<main class="curso-container">
    <section class="curso-intro">
        <div class="curso-intro__content">
            <h1>Curso de Especialización en Vinos</h1>
            <p class="curso-intro__descripcion">
                Curso de mayor profundidad y especialización en vinos con mayores contenidos acerca de elaboración, regiones, viticultura, enología y cata.
            </p>
        </div>
        <div class="curso-intro__imagen">
            <img src="img/imagen-curso-iniciacion.png" alt="Curso de especialización en vinos">
        </div>
    </section>

    <section class="curso-info">
        <div class="curso-info__container">
            <h2>Descripción del Curso</h2>
            <p>Curso de especialización en vinos con conocimientos técnicos y más profundos, donde nos introduciremos en regiones vinícolas más relevantes sus variedades de uvas más importantes, sus estilos y elaboración.</p>
            
            <div class="curso-info__detalles">
                <h3>Estructura del Curso</h3>
                <ul>
                    <li>Dos bloques con 5 partes cada uno</li>
                    <li>30 horas presenciales totales</li>
                    <li>6 días en total (5 horas por día)</li>
                    <li>12 plazas disponibles</li>
                    <li>No se requieren conocimientos previos</li>
                </ul>
            </div>

            <div class="curso-info__contenido">
                <h3>Contenidos del Curso</h3>
                <ul>
                    <li>Cultura del vino</li>
                    <li>Viticultura</li>
                    <li>Enología</li>
                    <li>Geografía vinícola</li>
                    <li>Cata sistemática</li>
                    <li>Maridajes</li>
                    <li>Cata de más de 20 vinos nacionales e internacionales</li>
                </ul>
            </div>

            <div class="curso-info__materiales">
                <h3>Materiales Incluidos</h3>
                <p>Se entregará al inicio del curso:</p>
                <ul>
                    <li>Materiales didácticos sobre la información más importante del curso</li>
                    <li>Fichas de cata</li>
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