<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo e(asset('css/styles.css')); ?>">
    <link rel="icon" href="<?php echo e(asset('favicon.ico')); ?>" type="image/x-icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <title>South Wines - Home</title>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <script src="<?php echo e(asset('js/scripts.js')); ?>?v=1.1"></script>
    <script src="<?php echo e(asset('js/support-widget.js')); ?>?v=1.0"></script>
</head>
<body>
    
    <div class="video-background">
        <video autoplay muted loop>
            <source src="<?php echo e(asset('videos/homevideo.mp4')); ?>" type="video/mp4"> <!-- Cambia el nombre del archivo si es necesario -->
            Tu navegador no soporta videos.
        </video>
    </div>

    <?php echo $__env->make('partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="hero-section">
        <div class="hero-content">
            <h1>Bienvenidos a South Wines Academy</h1>
        </div>
    </div>

    <main class="main-content">
        <section class="hero">
            <div class="container">
                <div class="text-box">
                    <div class="wine-separator"></div>
                    <p class="hero__text">En el mundo del vino, cada botella cuenta una historia y cada sorbo es una experiencia única. Creemos firmemente que el conocimiento es la clave para disfrutar plenamente de esta fascinante cultura.</p>
                    <p class="hero__cta">¡Salud y bienvenidos a bordo!</p>
                </div>
            </div>
        </section>

        <section class="courses-section">
            <div class="container">
                <div class="courses-content">
                    <div class="courses-text">
                        <h2>Nuestros Cursos</h2>
                        <p>Explora nuestra oferta educativa y descubre cómo podemos ayudarte a profundizar en el fascinante mundo del vino.</p>
                        <a href="<?php echo e(route('cursos')); ?>" class="courses-btn">Ver Cursos</a>
                    </div>
                    <div class="courses-image">
                        <img src="<?php echo e(asset('img/cursos.jpg')); ?>" alt="Nuestros Cursos">
                    </div>
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

    <script src="<?php echo e(asset('js/scripts.js')); ?>"></script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\laravel\southwines\resources\views/home.blade.php ENDPATH**/ ?>