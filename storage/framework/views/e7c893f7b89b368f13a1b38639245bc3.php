<!DOCTYPE html>
<html>
<head>
    <title>South Wines</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/sobre-nosotros.css">
    <link rel="icon" href="<?php echo e(asset('favicon.ico')); ?>" type="image/x-icon">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <script src="<?php echo e(asset('js/scripts.js')); ?>?v=1.1"></script>
    <script src="<?php echo e(asset('js/support-widget.js')); ?>?v=1.0"></script>
</head>
<body>
    
<?php echo $__env->make('partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<main class="main">
    <section class="equipo-docente">
        <h2 class="equipo-docente__titulo">EQUIPO DOCENTE</h2>
        
        <div class="equipo-docente__grid">
            <article class="equipo-docente__miembro">
                <div class="equipo-docente__imagen">
                    <img src="img/ana-hergueta.png" alt="Foto de docente">
                </div>
                <h3 class="equipo-docente__nombre">ANA HERGUETA GARDE</h3>
                <p class="equipo-docente__descripcion">
                    Enóloga y sumiller<br>
                    cofundadora y propietaria<br>
                    del restaurante Palo Cortao<br>
                    en Sevilla.
                </p>
            </article>

            <article class="equipo-docente__miembro">
                <div class="equipo-docente__imagen">
                    <img src="img/pilar-perez.png" alt="Foto de docente">
                </div>
                <h3 class="equipo-docente__nombre">PILAR PÉREZ VACA</h3>
                <p class="equipo-docente__descripcion">
                    Sumiller y docente.<br>
                    Mejor sumiller de Sevilla<br>
                    2016, 2018 y 2019.
                </p>
            </article>
        </div>
    </section>
</main>
<?php /**PATH C:\xampp\htdocs\laravel\southwines\resources\views/sobre-nosotros.blade.php ENDPATH**/ ?>