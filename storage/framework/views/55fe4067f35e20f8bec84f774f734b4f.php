<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo e(asset('css/login.css')); ?>?v=1.1">
    <link rel="stylesheet" href="<?php echo e(asset('css/styles.css')); ?>">
    <link rel="icon" href="<?php echo e(asset('favicon.ico')); ?>" type="image/x-icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="<?php echo e(asset('js/scripts.js')); ?>?v=1.1"></script>
    <script src="<?php echo e(asset('js/support-widget.js')); ?>?v=1.0"></script>
    
    <title>Recuperar Contraseña</title>
</head>
<body>
    <div class="video-background">
        <video autoplay muted loop>
            <source src="<?php echo e(asset('videos/loginvideo.mp4')); ?>" type="video/mp4">
            Tu navegador no soporta videos.
        </video>
    </div>
    <div class="login-container">
        <div class="login-card">
            <a href="<?php echo e(url('/')); ?>" class="logo-link">
                <i class="fas fa-home mini-icon"></i>
            </a>
            <div class="login-header">
                <h2>Recuperar Contraseña</h2>
                <p>Ingresa tu correo electrónico para recibir un enlace de recuperación</p>
            </div>

            <?php if(session('status')): ?>
                <div class="alert alert-success">
                    <?php echo e(session('status')); ?>

                </div>
            <?php endif; ?>

            <form method="POST" action="<?php echo e(route('password.email')); ?>">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <div class="input-container">
                        <input type="email" name="email" required placeholder=" " id="email">
                        <label for="email">Correo electrónico</label>
                    </div>
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="error-message"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <button type="submit" class="login-button">Enviar enlace de recuperación</button>
            </form>
            <div class="register-link">
                <span>¿Recordaste tu contraseña? <a href="<?php echo e(route('login')); ?>">Volver al login</a></span>
            </div>
        </div>
    </div>

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
<?php /**PATH C:\xampp\htdocs\laravel\southwines\resources\views/auth/forgot-password.blade.php ENDPATH**/ ?>