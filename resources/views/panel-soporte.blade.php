<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Soporte</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
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
                <img src="{{ asset('img/logo.png') }}" alt="Logo" class="sidebar-logo">
            </div>
            <nav class="sidebar-nav">
                <ul>
                    <li>
                        <a href="{{ route('panel-administrador') }}"><i class="fas fa-graduation-cap"></i> Cursos</a>
                    </li>
                    <li>
                        <a href="{{ route('panel-estudiantes') }}"><i class="fas fa-users"></i> Estudiantes</a>
                    </li>
                    <li>
                        <a href="{{ route('panel-estadisticas') }}"><i class="fas fa-chart-bar"></i> Estadísticas</a>
                    </li>
                    <li class="active">
                        <a href="{{ route('panel-soporte') }}"><i class="fas fa-headset"></i> Soporte</a>
                    </li>
                </ul>
            </nav>
        </aside>

        <main class="admin-main">
            <header class="admin-header">
                <h1>Mensajes de Soporte</h1>
                <div class="header-actions">
                    <button class="btn btn-primary" onclick="window.location.href='{{ route('home') }}'">
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
                                    @forelse($messages as $message)
                                        <tr class="{{ $message->read ? '' : 'table-warning' }}">
                                            <td>{{ $message->id }}</td>
                                            <td>{{ $message->name }}</td>
                                            <td>{{ $message->email }}</td>
                                            <td>
                                                <button class="btn btn-link" data-toggle="modal" data-target="#messageModal{{ $message->id }}">
                                                    {{ Str::limit($message->message, 50) }}
                                                </button>
                                            </td>
                                            <td>
                                                <span class="badge {{ $message->read ? 'badge-success' : 'badge-warning' }}">
                                                    {{ $message->read ? 'Leído' : 'No leído' }}
                                                </span>
                                            </td>
                                            <td>{{ $message->created_at->format('d/m/Y H:i') }}</td>
                                            <td>
                                                <form action="{{ route('support.markAsRead', $message->id) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm {{ $message->read ? 'btn-secondary' : 'btn-success' }}">
                                                        <i class="fas {{ $message->read ? 'fa-times' : 'fa-check' }}"></i>
                                                    </button>
                                                </form>
                                                <form action="{{ route('support.destroy', $message->id) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de eliminar este mensaje?')">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>

                                        <!-- Modal para ver el mensaje completo -->
                                        <div class="modal fade" id="messageModal{{ $message->id }}" tabindex="-1" role="dialog" aria-labelledby="messageModalLabel{{ $message->id }}" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="messageModalLabel{{ $message->id }}">Mensaje de {{ $message->name }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p><strong>Email:</strong> {{ $message->email }}</p>
                                                        <p><strong>Fecha:</strong> {{ $message->created_at->format('d/m/Y H:i') }}</p>
                                                        <hr>
                                                        <p>{{ $message->message }}</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                        <a href="mailto:{{ $message->email }}" class="btn btn-primary">
                                                            <i class="fas fa-reply"></i> Responder
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center">No hay mensajes de soporte</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html> 