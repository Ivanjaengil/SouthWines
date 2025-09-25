<!DOCTYPE html>
<html>
<head>
    <title>South Wines</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/vinosinternacionales.css">
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
                <h1>Curso de Vinos Internacionales</h1>
                <p class="curso-intro__descripcion">
                    Descubre los vinos más importantes del mundo, sus regiones, variedades y características únicas.
                </p>
            </div>
            <div class="curso-intro__imagen">
                <img src="img/imagen-curso-iniciacion.png" alt="Curso de vinos internacionales" 
                     onerror="this.onerror=null; this.src='img/default-wine-image.png';">
            </div>
        </section>

        <section class="curso-info">
            <div class="curso-info__container">
                <h2>Descripción del Curso</h2>
                <p>Curso especializado en vinos internacionales donde exploraremos las principales regiones vinícolas del mundo, sus variedades autóctonas, métodos de elaboración y características distintivas de cada región.</p>
                
                <div class="curso-info__detalles">
                    <h3>Estructura del Curso</h3>
                    <ul>
                        <li>Curso intensivo de 20 horas</li>
                        <li>4 sesiones de 5 horas cada una</li>
                        <li>12 plazas disponibles</li>
                        <li>Se recomienda conocimientos básicos de vino</li>
                    </ul>
                </div>

                <div class="curso-info__contenido">
                    <h3>Contenidos del Curso</h3>
                    <ul>
                        <li>Vinos de Francia (Bordeaux, Borgoña, Champagne)</li>
                        <li>Vinos de Italia (Toscana, Piemonte, Véneto)</li>
                        <li>Vinos del Nuevo Mundo (California, Chile, Argentina)</li>
                        <li>Vinos de Europa Central (Alemania, Austria)</li>
                        <li>Técnicas de cata internacional</li>
                        <li>Maridajes internacionales</li>
                        <li>Cata de 15 vinos internacionales premium</li>
                    </ul>
                </div>

                <div class="curso-info__materiales">
                    <h3>Materiales Incluidos</h3>
                    <p>Se entregará al inicio del curso:</p>
                    <ul>
                        <li>Manual completo de regiones vinícolas internacionales</li>
                        <li>Fichas de cata profesionales</li>
                        <li>Mapas de las principales regiones vinícolas</li>
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
