@extends('layout.app')

@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">Lista de roles</h6>
        <a class="btn btn-primary btn-icon-split" role="button" aria-disabled="true" href="/roles/crear">
            <span class="icon text-white-50"><i class="fas fa-plus"></i></span>
            <span class="text">Nuevo rol</span>
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped dataTable">
                <thead>
                    <tr>
                        <th scope="col">Rol</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Fecha creacion</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($roles as $rol)
                        <tr>
                            <td> {{ $rol["nombre"] }} </td>
                            <td> {{ $rol["activo"] == 'Y' ? 'Activo' : 'Inactivo' }} </td>
                            <td> {{ $rol["fecha_creacion"] }} </td>
                            
                            <td class="d-flex justify-content-center gap-3">
                                <a class="btn btn-danger btn-icon-split {{ $rol->nombre == "Doctor" ? 'disabled' : '' }}" role="button" aria-disabled="true" onclick="confirmar({{ $rol->rol_id }}, 'roles')">
                                    <span class="icon text-white-50"><i class="fa-solid fa-trash"></i></span>
                                    <span class="text">Eliminar</span>
                                </a>
                                <a href="/roles/editar/{{ $rol["rol_id"] }}" class="btn btn-warning btn-icon-split {{ $rol->nombre == "Doctor" ? 'disabled' : '' }}" role="button" aria-disabled="true">
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