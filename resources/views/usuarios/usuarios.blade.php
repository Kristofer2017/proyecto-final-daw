@extends('layout.app')

@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">Listado de usuarios</h6>
        <a class="btn btn-primary btn-icon-split" role="button" aria-disabled="true" href="/usuarios/crear">
            <span class="icon text-white-50"><i class="fas fa-plus"></i></span>
            <span class="text">Nuevo usuario</span>
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped dataTable">
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Rol</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Fecha creacion</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($usuarios as $usuario)
                        <tr>
                            <td>{{ htmlspecialchars($usuario["nombre"]) }}</td>
                            <td>{{ htmlspecialchars($usuario["apellido"]) }}</td>
                            <td>{{ htmlspecialchars($usuario["email"]) }}</td>
                            <td>{{ htmlspecialchars($usuario->rol->nombre) }}</td>
                            <td>{{ htmlspecialchars($usuario["activo"] == 'Y' ? 'Activo' : 'Inactivo') }}</td>
                            <td>{{ htmlspecialchars($usuario["fecha_creacion"]) }}</td>

                            <td class="d-flex justify-content-center gap-3">
                                <a class="btn btn-danger btn-icon-split" role="button" aria-disabled="true" onclick="confirmar({{ $usuario['usuario_id'] }}, 'usuarios')">
                                    <span class="icon text-white-50"><i class="fa-solid fa-trash"></i></span>
                                    <span class="text">Eliminar</span>
                                </a>
                                <a href="/usuarios/editar/{{ $usuario['usuario_id'] }}" class="btn btn-warning btn-icon-split" role="button" aria-disabled="true">
                                    <span class="icon text-white-50"><i class="fa-solid fa-pen"></i></span>
                                    <span class="text">Editar</span>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
