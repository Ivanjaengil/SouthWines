@extends('layouts.admin')

@section('content')
<h1>Solicitudes de registro pendientes</h1>

@if($estudiantes->count() > 0)
    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($estudiantes as $estudiante)
                <tr>
                    <td>{{ $estudiante->name }}</td>
                    <td>{{ $estudiante->email }}</td>
                    <td>
                        <a href="{{ route('admin.approve.user', $estudiante->id) }}" class="btn btn-success">Aprobar</a>
                        <a href="{{ route('admin.reject.user', $estudiante->id) }}" class="btn btn-danger">Rechazar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p>No hay solicitudes pendientes.</p>
@endif
@endsection