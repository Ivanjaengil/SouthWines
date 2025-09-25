<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Estadísticas</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
                    <li class="active">
                        <a href="{{ route('panel-estadisticas') }}"><i class="fas fa-chart-bar"></i> Estadísticas</a>
                    </li>
                    <li>
                        <a href="{{ route('panel-soporte') }}"><i class="fas fa-headset"></i> Soporte</a>
                    </li>
                </ul>
            </nav>
        </aside>

        <main class="admin-main">
            <header class="admin-header">
                <h1>Estadísticas del Sistema</h1>
                <div class="header-actions">
                    <button class="btn btn-primary" onclick="actualizarEstadisticas()">
                        <i class="fas fa-sync"></i> Actualizar datos
                    </button>
                    <button class="btn btn-primary" onclick="window.location.href='{{ route('home') }}'">
                        <i class="fas fa-sign-out-alt"></i> Salir del panel
                    </button>
                </div>
            </header>

            <div class="admin-content">
                <!-- Tarjetas de resumen -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="card bg-primary text-white">
                            <div class="card-body">
                                <h5 class="card-title">Total Estudiantes</h5>
                                <h2 id="total-estudiantes">0</h2>
                                <i class="fas fa-users fa-2x"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-success text-white">
                            <div class="card-body">
                                <h5 class="card-title">Cursos Activos</h5>
                                <h2 id="total-cursos">0</h2>
                                <i class="fas fa-graduation-cap fa-2x"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-info text-white">
                            <div class="card-body">
                                <h5 class="card-title">Inscripciones del Mes</h5>
                                <h2 id="inscripciones-mes">0</h2>
                                <i class="fas fa-chart-line fa-2x"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-warning text-white">
                            <div class="card-body">
                                <h5 class="card-title">Usuarios Pendientes</h5>
                                <h2 id="usuarios-pendientes">0</h2>
                                <i class="fas fa-user-clock fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Gráficos -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Inscripciones por Mes</h5>
                                <canvas id="inscripcionesChart"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Cursos más Populares</h5>
                                <canvas id="cursosPopularesChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        function actualizarEstadisticas() {
            $.ajax({
                url: '{{ route("estadisticas.datos") }}',
                method: 'GET',
                cache: false, // Evita el caché de la petición
                success: function(response) {
                    console.log('Datos recibidos:', response); // Para debugging

                    // Actualizar contadores con animación
                    animarContador('#total-estudiantes', response.totalEstudiantes);
                    animarContador('#total-cursos', response.totalCursos);
                    animarContador('#inscripciones-mes', response.inscripcionesMes);
                    animarContador('#usuarios-pendientes', response.usuariosPendientes);

                    // Actualizar gráficos
                    if (response.inscripcionesPorMes) {
                        actualizarGraficoInscripciones(response.inscripcionesPorMes);
                    }
                    if (response.cursosPopulares) {
                        actualizarGraficoCursosPopulares(response.cursosPopulares);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error al actualizar estadísticas:', error);
                }
            });
        }

        function animarContador(elementId, valorFinal) {
            const $elemento = $(elementId);
            const valorInicial = parseInt($elemento.text()) || 0;
            $({ valor: valorInicial }).animate({ valor: valorFinal }, {
                duration: 1000,
                step: function() {
                    $elemento.text(Math.floor(this.valor));
                },
                complete: function() {
                    $elemento.text(valorFinal);
                }
            });
        }

        function actualizarGraficoInscripciones(datos) {
            if (!datos || !datos.length) return;

            const ctx = document.getElementById('inscripcionesChart').getContext('2d');
            
            if (inscripcionesChart) {
                inscripcionesChart.destroy();
            }

            inscripcionesChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: datos.map(d => d.mes),
                    datasets: [{
                        label: 'Inscripciones',
                        data: datos.map(d => d.total),
                        borderColor: 'rgb(75, 192, 192)',
                        tension: 0.1,
                        fill: false
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                stepSize: 1
                            }
                        }
                    },
                    animation: {
                        duration: 1000
                    }
                }
            });
        }

        function actualizarGraficoCursosPopulares(datos) {
            if (!datos || !datos.length) return;

            const ctx = document.getElementById('cursosPopularesChart').getContext('2d');
            
            if (cursosPopularesChart) {
                cursosPopularesChart.destroy();
            }

            cursosPopularesChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: datos.map(d => d.nombre),
                    datasets: [{
                        label: 'Estudiantes Inscritos',
                        data: datos.map(d => d.estudiantes),
                        backgroundColor: 'rgba(54, 162, 235, 0.5)',
                        borderColor: 'rgb(54, 162, 235)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                stepSize: 1
                            }
                        }
                    },
                    animation: {
                        duration: 1000
                    }
                }
            });
        }

        // Actualizar datos cada 10 segundos
        $(document).ready(function() {
            actualizarEstadisticas(); // Primera carga
            setInterval(actualizarEstadisticas, 10000); // Actualizar cada 10 segundos
        });

        // Agregar listener para actualización manual
        document.querySelector('.btn-primary').addEventListener('click', function() {
            actualizarEstadisticas();
        });
    </script>
</body>
</html>
