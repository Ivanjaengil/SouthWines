<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cursos</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="icon" href="<?php echo e(asset('favicon.ico')); ?>" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo e(asset('css/cursos.css')); ?>">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <script src="<?php echo e(asset('js/scripts.js')); ?>?v=1.1"></script>
    <script src="support-widqet.js"></script>
</head>
<body>
    
    <?php echo $__env->make('partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <main class="main-content">
        <h1>Nuestros Cursos</h1>
        <div class="cursos-container">
            <?php $__currentLoopData = $cursos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $curso): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="curso-card">
                    <img src="<?php echo e(asset('storage/' . $curso->imagen)); ?>" alt="<?php echo e($curso->titulo); ?>" class="curso-logo">
                    <h2><?php echo e($curso->titulo); ?></h2>
                    <p><?php echo e($curso->descripcion); ?></p>
                    <div class="curso-info">
                        <span>Precio: <?php echo e($curso->precio); ?>€</span>
                        <?php if($curso->duracion): ?>
                            <span>Duración: <?php echo e($curso->duracion); ?> horas</span>
                        <?php endif; ?>
                    </div>
                    <a href="<?php echo e(route('curso.detalle', $curso)); ?>" class="btn btn-primary">Más Información</a>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </main>

 
    <footer class="footer">
    </footer>
</body>
</html<?php /**PATH C:\xampp\htdocs\laravel\southwines\resources\views/cursos.blade.php ENDPATH**/ ?>