@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Usuarios Pendientes de Aprobación</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Fecha de Solicitud</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pendingUsers as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at }}</td>
                <td>
                    <form action="{{ route('admin.approve-user', $user->id) }}" method="POST" class="d-inline">
                        @csrf
                        <button class="btn btn-success btn-sm">Aprobar</button>
                    </form>
                    <form action="{{ route('admin.reject-user', $user->id) }}" method="POST" class="d-inline">
                        @csrf
                        <button class="btn btn-danger btn-sm">Rechazar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection