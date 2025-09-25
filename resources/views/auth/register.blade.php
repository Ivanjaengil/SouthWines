<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <title>Registro</title>
</head>
<body>
    <div class="video-background">
        <video autoplay muted loop>
            <source src="{{ asset('videos/loginvideo.mp4') }}" type="video/mp4">
            Tu navegador no soporta videos.
        </video>
    </div>
    <div class="login-container">
        <div class="login-card">
            <a href="{{ url('/') }}" class="logo-link">
                <i class="fas fa-home mini-icon"></i>
            </a>
            <div class="login-header">
                <h2>Registro</h2>
                <p>Crea una cuenta para acceder a tus cursos de vino</p>
            </div>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                    <div class="input-container">
                        <input type="text" name="name" required placeholder=" " id="name">
                        <label for="name">Nombre</label>
                    </div>
                </div>
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
                <div class="form-group">
                    <div class="input-container">
                        <input type="password" name="password_confirmation" required placeholder=" " id="password_confirmation">
                        <label for="password_confirmation">Confirmar contraseña</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-container">
                        <input type="text" name="phone" required placeholder=" " id="phone">
                        <label for="phone">Número de teléfono</label>
                    </div>
                </div>
                <button type="submit" class="login-button">Registrarse</button>
            </form>
            <div class="register-link">
                <span>¿Ya tienes una cuenta? <a href="{{ route('login') }}" class="header__link">Iniciar Sesión</a></span>
            </div>
        </div>
    </div>
</body>
</html>
