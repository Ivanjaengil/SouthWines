<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración - Cursos</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/admin.css')); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <!-- Bootstrap JS and dependencies -->
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
                    <li class="active">
                        <a href="<?php echo e(route('panel-administrador')); ?>"><i class="fas fa-graduation-cap"></i> Cursos</a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('panel-estudiantes')); ?>"><i class="fas fa-users"></i> Estudiantes</a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('panel-estadisticas')); ?>"><i class="fas fa-chart-bar"></i> Estadísticas</a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('panel-soporte')); ?>"><i class="fas fa-headset"></i> Soporte</a>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Contenido principal -->
        <main class="admin-main">
            <header class="admin-header">
                <h1>Gestión de Cursos</h1>
                <div class="header-actions">
                    <button class="btn btn-primary" onclick="window.location.href='<?php echo e(route('home')); ?>'">
                        <i class="fas fa-sign-out-alt"></i> Salir del panel
                    </button>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#nuevoCursoModal">
                        <i class="fas fa-plus"></i> Nuevo Curso
                    </button>
                </div>
            </header>

            <!-- Modal para nuevo curso -->
            <div class="modal fade" id="nuevoCursoModal" tabindex="-1" role="dialog" aria-labelledby="nuevoCursoModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="nuevoCursoModalLabel">Crear Nuevo Curso</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?php echo e(route('curso.store')); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="titulo">Título del Curso</label>
                                    <input type="text" class="form-control" id="titulo" name="titulo" required>
                                </div>
                                <div class="form-group">
                                    <label for="precio">Precio</label>
                                    <input type="number" class="form-control" id="precio" name="precio" step="0.01" required>
                                </div>
                                <div class="form-group">
                                    <label for="duracion">Duración (semanas)</label>
                                    <input type="number" class="form-control" id="duracion" name="duracion" required>
                                </div>
                                <div class="form-group">
                                    <label for="imagen">Imagen del Curso</label>
                                    <input type="file" class="form-control-file" id="imagen" name="imagen">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Guardar Curso</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Modal para editar curso -->
            <div class="modal fade" id="editarCursoModal" tabindex="-1" role="dialog" aria-labelledby="editarCursoModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editarCursoModalLabel">Editar Curso</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="editarCursoForm" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="editar_id">ID del Curso</label>
                                    <input type="text" class="form-control" id="editar_id" name="id" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="editar_titulo">Título del Curso</label>
                                    <input type="text" class="form-control" id="editar_titulo" name="titulo" required>
                                </div>
                                <div class="form-group">
                                    <label for="editar_precio">Precio</label>
                                    <input type="number" class="form-control" id="editar_precio" name="precio" step="0.01" required>
                                </div>
                                <div class="form-group">
                                    <label for="editar_duracion">Duración (semanas)</label>
                                    <input type="number" class="form-control" id="editar_duracion" name="duracion" required>
                                </div>
                                <div class="form-group">
                                    <label for="editar_imagen">Imagen del Curso</label>
                                    <input type="file" class="form-control-file" id="editar_imagen" name="imagen">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="admin-content">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="admin-table">
                                <thead>
                                    <tr>
                                        <th>ID Curso</th>
                                        <th>Título</th>
                                        <th>Precio</th>
                                        <th>Duración</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(isset($cursos)): ?>
                                        <?php if($cursos->count() > 0): ?>
                                            <?php $__currentLoopData = $cursos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $curso): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($curso->id); ?></td>
                                                    <td><?php echo e($curso->titulo); ?></td>
                                                    <td>€<?php echo e(number_format($curso->precio, 2)); ?></td>
                                                    <td><?php echo e($curso->duracion); ?> semanas</td>
                                                    <td>
                                                        <span class="badge badge-success">
                                                            Activo
                                                        </span>
                                                    </td>
                                                    <td class="actions">
                                                        <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#editarCursoModal" 
                                                            data-id="<?php echo e($curso->id); ?>"
                                                            data-titulo="<?php echo e($curso->titulo); ?>"
                                                            data-precio="<?php echo e($curso->precio); ?>"
                                                            data-duracion="<?php echo e($curso->duracion); ?>">
                                                            <i class="fas fa-edit"></i> Editar
                                                        </button>
                                                        <form action="<?php echo e(route('curso.destroy', $curso->id)); ?>" method="POST" style="display: inline;">
                                                            <?php echo csrf_field(); ?>
                                                            <?php echo method_field('DELETE'); ?>
                                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este curso?')">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="6" class="text-center">No hay cursos disponibles</td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="6" class="text-center text-danger">Error: Variable $cursos no definida</td>
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

    <script>
        $('#editarCursoModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var titulo = button.data('titulo');
            var precio = button.data('precio');
            var duracion = button.data('duracion');
            
            var modal = $(this);
            modal.find('#editar_id').val(id);
            modal.find('#editar_titulo').val(titulo);
            modal.find('#editar_precio').val(precio);
            modal.find('#editar_duracion').val(duracion);
            
            var url = '<?php echo e(route("curso.update", ["curso" => ":id"])); ?>'.replace(':id', id);
            modal.find('#editarCursoForm').attr('action', url);
        });

        $('#editarCursoForm').on('submit', function(e) {
            e.preventDefault();
            
            var form = $(this);
            var id = form.find('#editar_id').val();
            var url = '<?php echo e(route("curso.update", ["curso" => ":id"])); ?>'.replace(':id', id);
            var formData = new FormData(this);

            $.ajax({
                type: "POST",
                url: url,
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    $('#editarCursoModal').modal('hide');
                    location.reload(); // Recargar la página para ver los cambios
                },
                error: function(xhr) {
                    var errors = xhr.responseJSON.errors;
                    $.each(errors, function(key, value) {
                        toastr.error(value[0]);
                    });
                }
            });
        });
    </script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\SouthWines\resources\views/panel-administrador.blade.php ENDPATH**/ ?>