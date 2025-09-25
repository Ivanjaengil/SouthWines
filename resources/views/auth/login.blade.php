<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/login.css') }}?v=1.1">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    
    <title>Inicio de Sesión</title>
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
                <h2>Iniciar Sesión</h2>
                <p>Accede a tus cursos de vino</p>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <p>La cuenta no está activada o las credenciales son incorrectas.</p>
                </div>
            @endif
            <form method="POST" action="{{ route('login') }}">
                @csrf
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
                    <a href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a>
                </div>
            </form>
            <div class="register-link">
                <span>¿No tienes una cuenta? <a href="{{ route('register') }}" class="header__link">Registrate</a></span>
            </div>
        </div>
    </div>

</body>
</html>
