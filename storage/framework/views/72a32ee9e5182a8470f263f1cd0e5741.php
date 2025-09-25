<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo e(asset('css/editar-perfil.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/styles.css')); ?>">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <title>Editar perfil</title>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <script src="<?php echo e(asset('js/scripts.js')); ?>?v=1.1"></script>
    <script src="<?php echo e(asset('js/support-widget.js')); ?>?v=1.0"></script>
    <script src="<?php echo e(asset('js/modal.js')); ?>"></script>
</head>
<body>
    <?php echo $__env->make('partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="profile-edit-container">
        <h1>Editar Perfil de <?php echo e($user->name); ?></h1>

        <div class="profile-image">
            <?php if(auth()->user()->image): ?>
                <img src="<?php echo e(asset('storage/' . auth()->user()->image)); ?>" alt="Foto de perfil">
       <?php endif; ?>
        </div>

        <form action="<?php echo e(route('profile.update')); ?>" method="POST" class="profile-edit-form" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PATCH'); ?>

            <div class="form-group">
                <label for="name">Nombre:</label>
                <input type="text" id="name" name="name" value="<?php echo e($user->name); ?>" required>
            </div>

            <div class="form-group">
                <label for="email">Correo Electrónico:</label>
                <input type="email" id="email" name="email" value="<?php echo e($user->email); ?>" required>
            </div>

            <div class="form-group">
                <label for="phone">Número de Teléfono:</label>
                <input type="text" id="phone" name="phone" value="<?php echo e($user->phone); ?>">
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

            <?php if(session('success')): ?>
                <div class="success-message">
                    <i class="fas fa-check-circle"></i>
                    <span><?php echo e(session('success')); ?></span>
                </div>
            <?php endif; ?>
        </form>
    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\laravel\southwines\resources\views/profile/edit.blade.php ENDPATH**/ ?>