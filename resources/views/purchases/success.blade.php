<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>¡Compra Exitosa!</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/pago.css') }}?v=1.0">
    </head>
<body>
    @include('partials.header')
    
    <div class="success-container">
        <div class="success-message">
            <i class="fas fa-check-circle"></i>
            <h1>¡Compra Realizada con Éxito!</h1>
            
            <div class="purchase-details">
                <h2>Detalles de tu compra:</h2>
                <p><strong>Curso:</strong> {{ $purchase->curso->nombre }}</p>
                <p><strong>Precio:</strong> €{{ $purchase->amount }}</p>
                <p><strong>Fecha:</strong> {{ $purchase->created_at->format('d/m/Y') }}</p>
            </div>

            <div class="next-steps">
                <p>Recibirás un correo electrónico con los detalles de acceso al curso.</p>
                <a href="{{ route('home') }}" class="btn-home">Volver al Inicio</a>
            </div>
        </div>
    </div>
</body>
</html>