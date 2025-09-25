<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo e(asset('css/styles.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/pago.css')); ?>?v=1.0">
    <link rel="icon" href="<?php echo e(asset('favicon.ico')); ?>" type="image/x-icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <title>South Wines - Pago</title>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <script src="<?php echo e(asset('js/scripts.js')); ?>?v=1.1"></script>
    <script src="<?php echo e(asset('js/support-widget.js')); ?>?v=1.0"></script>
</head>
<body>
    

    <?php echo $__env->make('partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <main class="main-content">
        <div class="container">
            <div class="checkout-header">
                <h1>Finalizar Compra</h1>
                <div class="wine-separator"></div>
            </div>

            <div class="checkout-container">
                <div class="checkout-steps">
                    <div class="step active">
                        <span class="step-number">1</span>
                        <span class="step-text">Resumen</span>
                    </div>
                    <div class="step active">
                        <span class="step-number">2</span>
                        <span class="step-text">Pago</span>
                    </div>
                    <div class="step">
                        <span class="step-number">3</span>
                        <span class="step-text">Confirmación</span>
                    </div>
                </div>

                <div class="checkout-grid">
                    <div class="order-summary">
                        <div class="course-card">
                            <img src="<?php echo e(asset('img/imagen-curso-iniciacion.png')); ?>" alt="<?php echo e($curso->nombre); ?>">
                            <div class="course-info">
                                <h3><?php echo e($curso->nombre); ?></h3>
                                <div class="course-details">
                                    <div class="detail-item">
                                        <i class="fas fa-clock"></i>
                                        <span><?php echo e($curso->duracion); ?> horas</span>
                                    </div>
                                    <div class="detail-item">
                                        <i class="fas fa-calendar"></i>
                                        <span>Inicio inmediato</span>
                                    </div>
                                </div>
                                <div class="price-tag">
                                    <span class="price">€<?php echo e($curso->precio); ?></span>
                                    <span class="tax-info">IVA incluido</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="payment-details">
                        <h2>Método de Pago</h2>
                        <div class="payment-methods">
                            <div class="payment-method active">
                                <i class="fas fa-credit-card"></i>
                                <span>Tarjeta de crédito/débito</span>
                            </div>
                        </div>

                        <form action="<?php echo e(route('purchase.store', $curso)); ?>" method="POST" class="payment-form">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <label for="nombre_titular">Nombre del titular</label>
                                <input type="text" id="nombre_titular" name="nombre_titular" 
                                       placeholder="Como aparece en la tarjeta" required>
                            </div>

                            <div class="form-group">
                                <label for="numero_tarjeta">Número de tarjeta</label>
                                <div class="input-icon">
                                    <input type="text" id="numero_tarjeta" name="numero_tarjeta" 
                                           placeholder="1234 5678 9012 3456" maxlength="16" required>
                                    <i class="fas fa-credit-card"></i>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label for="fecha_caducidad">Fecha de caducidad</label>
                                    <input type="text" id="fecha_caducidad" name="fecha_caducidad" 
                                           placeholder="MM/AA" maxlength="5" required>
                                </div>

                                <div class="form-group">
                                    <label for="cvv">CVV</label>
                                    <div class="input-icon">
                                        <input type="text" id="cvv" name="cvv" 
                                               placeholder="123" maxlength="3" required>
                                        <i class="fas fa-lock"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="form-footer">
                                <button type="submit" class="btn-primary">
                                    <i class="fas fa-lock"></i>
                                    Pagar €<?php echo e($curso->precio); ?>

                                </button>
                                <div class="secure-info">
                                    <i class="fas fa-shield-alt"></i>
                                    <span>Pago seguro encriptado</span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
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
</html><?php /**PATH C:\xampp\htdocs\laravel\southwines\resources\views/pago.blade.php ENDPATH**/ ?>