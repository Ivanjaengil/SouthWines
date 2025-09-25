<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Estudiantes</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="admin-layout">
        <!-- Sidebar -->
        <aside class="admin-sidebar">
            <div class="sidebar-header">
                <img src="{{ asset('img/logo.png') }}" alt="Logo" class="sidebar-logo">
            </div>
            <nav class="sidebar-nav">
                <ul>
                    <li>
                        <a href="{{ route('panel-administrador') }}"><i class="fas fa-graduation-cap"></i> Cursos</a>
                    </li>
                    <li class="active">
                        <a href="{{ route('panel-estudiantes') }}"><i class="fas fa-users"></i> Estudiantes</a>
                    </li>
                    <li>
                        <a href="{{ route('panel-estadisticas') }}"><i class="fas fa-chart-bar"></i> Estadísticas</a>
                    </li>
                    <li>
                        <a href="{{ route('panel-soporte') }}"><i class="fas fa-headset"></i> Soporte</a>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Contenido principal -->
        <main class="admin-main">
            <header class="admin-header">
                <h1>Gestión de Estudiantes</h1>
                <div class="header-actions">
                    <button class="btn btn-primary" onclick="window.location.href='{{ route('home') }}'">
                        <i class="fas fa-sign-out-alt"></i> Salir del panel
                    </button>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#nuevoEstudianteModal">
                        <i class="fas fa-plus"></i> Nuevo Estudiante
                    </button>
                </div>
            </header>

            <div class="admin-content">
                <!-- Tabla de Usuarios Pendientes -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h3>Usuarios Pendientes de Aprobación</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table admin-table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Email</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($usuariosPendientes as $pendiente)
                                        <tr>
                                            <td>{{ $pendiente->id }}</td>
                                            <td>{{ $pendiente->name }}</td>
                                            <td>{{ $pendiente->email }}</td>
                                            <td><span class="badge badge-warning">Pendiente</span></td>
                                            <td>
                                                <form action="{{ route('estudiante.aprobar', $pendiente->id) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-success">
                                                        <i class="fas fa-check"></i> Aprobar
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">No hay usuarios pendientes de aprobación</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Tabla de Estudiantes Existente -->
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table admin-table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Email</th>
                                        <th>Teléfono</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @isset($estudiantes)
                                        @if($estudiantes->count() > 0)
                                            @foreach($estudiantes as $estudiante)
                                                <tr>
                                                    <td>{{ $estudiante->id }}</td>
                                                    <td>{{ $estudiante->name }}</td>
                                                    <td>{{ $estudiante->email }}</td>
                                                    <td>{{ $estudiante->phone ?? 'No disponible' }}</td>
                                                    <td><span class="badge badge-success">{{ $estudiante->status }}</span></td>
                                                    <td class="actions">
                                                        <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#editarEstudianteModal" 
                                                            data-id="{{ $estudiante->id }}"
                                                            data-name="{{ $estudiante->name }}"
                                                            data-email="{{ $estudiante->email }}"
                                                            data-phone="{{ $estudiante->phone }}">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                        <form class="delete-form" action="{{ route('estudiante.destroy', $estudiante->id) }}" method="POST" style="display: inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="6" class="text-center">No hay estudiantes registrados</td>
                                            </tr>
                                        @endif
                                    @else
                                        <tr>
                                            <td colspan="6" class="text-center text-danger">Error: Variable $estudiantes no definida</td>
                                        </tr>
                                    @endisset
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Modal para nuevo estudiante -->
    <div class="modal fade" id="nuevoEstudianteModal" tabindex="-1" role="dialog" aria-labelledby="nuevoEstudianteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="nuevoEstudianteModalLabel">Crear Nuevo Estudiante</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="nuevoEstudianteForm" action="{{ route('estudiante.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="telefono">Teléfono</label>
                            <input type="tel" class="form-control" id="telefono" name="phone">
                        </div>
                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                            <small class="form-text text-muted">La contraseña debe contener al menos una mayúscula y mínimo 7 caracteres.</small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar Estudiante</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal para editar estudiante -->
    <div class="modal fade" id="editarEstudianteModal" tabindex="-1" role="dialog" aria-labelledby="editarEstudianteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editarEstudianteModalLabel">Editar Estudiante</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="editarEstudianteForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="edit_nombre">Nombre</label>
                            <input type="text" class="form-control" id="edit_nombre" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_email">Email</label>
                            <input type="email" class="form-control" id="edit_email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_telefono">Teléfono</label>
                            <input type="tel" class="form-control" id="edit_telefono" name="phone">
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

    <script>
        (function($) {
            $('#editarEstudianteModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var id = button.data('id');
                var name = button.data('name');
                var email = button.data('email');
                var phone = button.data('phone');
                
                var modal = $(this);
                modal.find('#edit_nombre').val(name);
                modal.find('#edit_email').val(email);
                modal.find('#edit_telefono').val(phone);
                modal.find('#editarEstudianteForm').attr('action', '/estudiantes/' + id);
            });

            $('#editarEstudianteForm').on('submit', function(e) {
                e.preventDefault();
                
                var form = $(this);
                var url = form.attr('action');
                var data = form.serialize();

                $.ajax({
                    type: "POST",
                    url: url,
                    data: data,
                    success: function(response) {
                        $('#editarEstudianteModal').modal('hide');
                        
                        // Actualizar la fila correspondiente en la tabla
                        var row = $('button[data-id="' + response.estudiante.id + '"]').closest('tr');
                        row.find('td:eq(1)').text(response.estudiante.name);
                        row.find('td:eq(2)').text(response.estudiante.email);
                        row.find('td:eq(3)').text(response.estudiante.phone || 'No disponible');
                        row.find('button[data-toggle="modal"]')
                            .attr('data-name', response.estudiante.name)
                            .attr('data-email', response.estudiante.email)
                            .attr('data-phone', response.estudiante.phone);
                        
                        // Mostrar notificación de éxito
                        toastr.success(response.success);
                    },
                    error: function(xhr) {
                        // Mostrar errores de validación
                        var errors = xhr.responseJSON.errors;
                        $.each(errors, function(key, value) {
                            toastr.error(value[0]);
                        });
                    }
                });
            });

            $('#nuevoEstudianteForm').on('submit', function(e) {
                e.preventDefault();
                
                var form = $(this);
                var url = form.attr('action');
                var data = form.serialize();

                $.ajax({
                    type: "POST",
                    url: url,
                    data: data,
                    success: function(response) {
                        $('#nuevoEstudianteModal').modal('hide');
                        form[0].reset();
                        toastr.success(response.success);

                        // Agregar el nuevo estudiante a la tabla
                        var newRow = '<tr>' +
                            '<td>' + response.estudiante.id + '</td>' +
                            '<td>' + response.estudiante.name + '</td>' +
                            '<td>' + response.estudiante.email + '</td>' +
                            '<td>' + (response.estudiante.phone || 'No disponible') + '</td>' +
                            '<td><span class="badge badge-success">Activo</span></td>' +
                            '<td class="actions">' +
                                '<button class="btn btn-sm btn-info" data-toggle="modal" data-target="#editarEstudianteModal" ' +
                                    'data-id="' + response.estudiante.id + '" ' +
                                    'data-name="' + response.estudiante.name + '" ' +
                                    'data-email="' + response.estudiante.email + '" ' +
                                    'data-phone="' + response.estudiante.phone + '">' +
                                    '<i class="fas fa-edit"></i>' +
                                '</button>' +
                                '<form class="delete-form" action="{{ route("estudiante.destroy", ":id") }}" method="POST" style="display: inline;">'.replace(':id', response.estudiante.id) +
                                    '@csrf' +
                                    '@method("DELETE")' +
                                    '<button type="submit" class="btn btn-sm btn-danger">' +
                                        '<i class="fas fa-trash"></i>' +
                                    '</button>' +
                                '</form>' +
                            '</td>' +
                        '</tr>';

                        $('table.admin-table tbody').append(newRow);
                    },
                    error: function(xhr) {
                        // Mostrar errores de validación
                        var errors = xhr.responseJSON.errors;
                        $.each(errors, function(key, value) {
                            toastr.error(value[0]);
                        });
                    }
                });
            });

            $(document).on('submit', '.delete-form', function(e) {
                e.preventDefault();

                var form = $(this);
                var url = form.attr('action');

                if (confirm('¿Estás seguro de que deseas eliminar este estudiante?')) {
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: {
                            _method: 'DELETE',
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            toastr.success(response.success);
                            form.closest('tr').remove();
                        },
                        error: function(xhr) {
                            toastr.error('Error al eliminar el estudiante');
                        }
                    });
                }
            });
        })(jQuery);
    </script>
</body>
</html>
