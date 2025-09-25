<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo e(asset('css/login.css')); ?>?v=1.1">
    <link rel="icon" href="<?php echo e(asset('favicon.ico')); ?>" type="image/x-icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    
    <title>Inicio de Sesión</title>
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
                <h2>Iniciar Sesión</h2>
                <p>Accede a tus cursos de vino</p>
            </div>
            <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <p>La cuenta no está activada o las credenciales son incorrectas.</p>
                </div>
            <?php endif; ?>
            <form method="POST" action="<?php echo e(route('login')); ?>">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <div class="input-container">
                        <input type="email" name="email" required placeholder=" " id="email">
                        <label for="email">Correo electrónico</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-container">
                        <input type="password" name="password" required placeholder=" " id="password">
                        <label for="password">Contraseña</label>
                    </div>
                </div>
                <button type="submit" class="login-button">Iniciar Sesión</button>
                <div class="forgot-password">
                    <a href="<?php echo e(route('password.request')); ?>">¿Olvidaste tu contraseña?</a>
                </div>
            </form>
            <div class="register-link">
                <span>¿No tienes una cuenta? <a href="<?php echo e(route('register')); ?>" class="header__link">Registrate</a></span>
            </div>
        </div>
    </div>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\SouthWines\resources\views/auth/login.blade.php ENDPATH**/ ?>