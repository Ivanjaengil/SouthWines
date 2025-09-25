<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/editar-perfil.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <title>Editar perfil</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset('js/scripts.js') }}?v=1.1"></script>
    <script src="{{ asset('js/support-widget.js') }}?v=1.0"></script>
    <script src="{{ asset('js/modal.js') }}"></script>
</head>
<body>
    @include('partials.header')

    <div class="profile-edit-container">
        <h1>Editar Perfil de {{ $user->name }}</h1>

        <div class="profile-image">
            @if(auth()->user()->image)
                <img src="{{ asset('storage/' . auth()->user()->image) }}" alt="Foto de perfil">
       @endif
        </div>

        <form action="{{ route('profile.update') }}" method="POST" class="profile-edit-form" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="form-group">
                <label for="name">Nombre:</label>
                <input type="text" id="name" name="name" value="{{ $user->name }}" required>
            </div>

            <div class="form-group">
                <label for="email">Correo Electrónico:</label>
                <input type="email" id="email" name="email" value="{{ $user->email }}" required>
            </div>

            <div class="form-group">
                <label for="phone">Número de Teléfono:</label>
                <input type="text" id="phone" name="phone" value="{{ $user->phone }}">
            </div>

            <div class="form-group">
                <label for="photo">Foto de Perfil:</label>
                <input type="file" id="photo" name="photo" accept="image/*">
            </div>
    
            <div class="form-group">
                <label for="password">Nueva Contraseña:</label>
                <input type="password" id="password" name="password">
            </div>

            <button type="submit" class="btn">Actualizar Perfil</button>

            @if(session('success'))
                <div class="success-message">
                    <i class="fas fa-check-circle"></i>
                    <span>{{ session('success') }}</span>
                </div>
            @endif
        </form>
    </div>
</body>
</html>
