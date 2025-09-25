<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Soporte</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/admin.css')); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="admin-layout">
        <!-- Sidebar -->
        <aside class="admin-sidebar">
            <div class="sidebar-header">
                <img src="<?php echo e(asset('img/logo.png')); ?>" alt="Logo" class="sidebar-logo">
            </div>
            <nav class="sidebar-nav">
                <ul>
                    <li>
                        <a href="<?php echo e(route('panel-administrador')); ?>"><i class="fas fa-graduation-cap"></i> Cursos</a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('panel-estudiantes')); ?>"><i class="fas fa-users"></i> Estudiantes</a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('panel-estadisticas')); ?>"><i class="fas fa-chart-bar"></i> Estadísticas</a>
                    </li>
                    <li class="active">
                        <a href="<?php echo e(route('panel-soporte')); ?>"><i class="fas fa-headset"></i> Soporte</a>
                    </li>
                </ul>
            </nav>
        </aside>

        <main class="admin-main">
            <header class="admin-header">
                <h1>Mensajes de Soporte</h1>
                <div class="header-actions">
                    <button class="btn btn-primary" onclick="window.location.href='<?php echo e(route('home')); ?>'">
                        <i class="fas fa-sign-out-alt"></i> Salir del panel
                    </button>
                </div>
            </header>

            <div class="admin-content">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table admin-table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Email</th>
                                        <th>Mensaje</th>
                                        <th>Estado</th>
                                        <th>Fecha</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__empty_1 = true; $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr class="<?php echo e($message->read ? '' : 'table-warning'); ?>">
                                            <td><?php echo e($message->id); ?></td>
                                            <td><?php echo e($message->name); ?></td>
                                            <td><?php echo e($message->email); ?></td>
                                            <td>
                                                <button class="btn btn-link" data-toggle="modal" data-target="#messageModal<?php echo e($message->id); ?>">
                                                    <?php echo e(Str::limit($message->message, 50)); ?>

                                                </button>
                                            </td>
                                            <td>
                                                <span class="badge <?php echo e($message->read ? 'badge-success' : 'badge-warning'); ?>">
                                                    <?php echo e($message->read ? 'Leído' : 'No leído'); ?>

                                                </span>
                                            </td>
                                            <td><?php echo e($message->created_at->format('d/m/Y H:i')); ?></td>
                                            <td>
                                                <form action="<?php echo e(route('support.markAsRead', $message->id)); ?>" method="POST" style="display: inline;">
                                                    <?php echo csrf_field(); ?>
                                                    <button type="submit" class="btn btn-sm <?php echo e($message->read ? 'btn-secondary' : 'btn-success'); ?>">
                                                        <i class="fas <?php echo e($message->read ? 'fa-times' : 'fa-check'); ?>"></i>
                                                    </button>
                                                </form>
                                                <form action="<?php echo e(route('support.destroy', $message->id)); ?>" method="POST" style="display: inline;">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de eliminar este mensaje?')">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>

                                        <!-- Modal para ver el mensaje completo -->
                                        <div class="modal fade" id="messageModal<?php echo e($message->id); ?>" tabindex="-1" role="dialog" aria-labelledby="messageModalLabel<?php echo e($message->id); ?>" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="messageModalLabel<?php echo e($message->id); ?>">Mensaje de <?php echo e($message->name); ?></h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p><strong>Email:</strong> <?php echo e($message->email); ?></p>
                                                        <p><strong>Fecha:</strong> <?php echo e($message->created_at->format('d/m/Y H:i')); ?></p>
                                                        <hr>
                                                        <p><?php echo e($message->message); ?></p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                        <a href="mailto:<?php echo e($message->email); ?>" class="btn btn-primary">
                                                            <i class="fas fa-reply"></i> Responder
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <tr>
                                            <td colspan="7" class="text-center">No hay mensajes de soporte</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html> <?php /**PATH C:\xampp\htdocs\SouthWines\resources\views/panel-soporte.blade.php ENDPATH**/ ?>