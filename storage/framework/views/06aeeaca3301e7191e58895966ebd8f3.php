<!DOCTYPE html>
<html>
<head>
    <title>South Wines</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('css/curso-iniciacion-vinos.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/styles.css')); ?>?v=1.1">
    <link rel="icon" href="<?php echo e(asset('favicon.ico')); ?>" type="image/x-icon">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <script src="<?php echo e(asset('js/scripts.js')); ?>?v=1.1"></script>
    <script src="<?php echo e(asset('js/support-widget.js')); ?>?v=1.0"></script>
</head>
<body>
<?php echo $__env->make('partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <main class="curso-container">
        <section class="curso-intro">
            <div class="curso-intro__content">
                <h1>Curso de Iniciación a los Vinos</h1>
                <p class="curso-intro__descripcion">
                    Amplía tus conocimientos básicos sobre la elaboración de los diferentes vinos y el aprendizaje en cata de los vinos.
                </p>
            </div>
            <div class="curso-intro__imagen">
            <img src="<?php echo e(asset('img/imagen-curso-iniciacion.png')); ?>" 
                 alt="Curso de vinos internacionales" 
                 onerror="this.onerror=null; this.src='<?php echo e(asset('img/default-wine-image.png')); ?>';">
        </div>
    </section>



    

        <section class="curso-info">
            <div class="curso-info__container">
                <h2>Descripción del Curso</h2>
                <p>Curso dedicado a introducirnos en el mundo del vino en el que descubriremos las diferencias entre los vinos más conocidos en el mercado, su proceso de elaboración, iniciación a las diferentes variedades de uva más importantes e iniciaremos la técnica básica de la cata de vinos.</p>
                
                <div class="curso-info__detalles info-block">
                    <h3>Estructura del Curso</h3>
                    <ul>
                        <li>Dos bloques con 4 partes cada uno</li>
                        <li>Duración total: 5 horas presenciales</li>
                        <li>Plazas disponibles: 12</li>
                        <li>No se requieren conocimientos previos</li>
                    </ul>
                </div>

                <div class="curso-info__contenido info-block">
                    <h3>Contenidos del Curso</h3>
                    <ul>
                        <li>Cultura del vino</li>
                        <li>Viticultura</li>
                        <li>Elaboración</li>
                        <li>Cata sistemática</li>
                        <li>Maridajes</li>
                        <li>Cata de 6 vinos nacionales e internacionales</li>
                    </ul>
                </div>

                <div class="curso-info__materiales info-block">
                    <h3>Materiales Incluidos</h3>
                    <p>Se entregará al inicio del curso:</p>
                    <ul>
                        <li>Materiales didácticos sobre la información más importante del curso</li>
                        <li>Fichas de cata</li>
                    </ul>
                </div>

                <div class="curso-info__inscripcion">
                    <a href="<?php echo e(route('purchase.create', $curso)); ?>" class="btn-inscripcion">Inscríbete Ahora</a>
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
</html><?php /**PATH C:\xampp\htdocs\SouthWines\resources\views/iniciacion-vinos.blade.php ENDPATH**/ ?>