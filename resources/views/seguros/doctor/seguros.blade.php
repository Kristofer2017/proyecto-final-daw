@extends('layout.app')
@section('title', 'Seguros')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">Listado de seguros</h6>
        <a class="btn btn-primary btn-icon-split" role="button" aria-disabled="true" href="/seguros/crear">
            <span class="icon text-white-50"><i class="fas fa-plus"></i></span>
            <span class="text">Nuevo seguro</span>
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped dataTable">
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Fecha creacion</th>
                        <th scope="col" class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($seguros as $seguro)
                        <tr>
                            <td>{{ htmlspecialchars($seguro["nombre"]) }}</td>
                            <td>{{ htmlspecialchars($seguro["telefono"]) }}</td>
                            <td>{{ htmlspecialchars($seguro["activo"] == 'Y' ? 'Activo' : 'Inactivo') }}</td>
                            <td>{{ htmlspecialchars($seguro["fecha_creacion"]) }}</td>
                            <td class="d-flex gap-3 justify-content-center">
                                <a class="btn btn-danger btn-icon-split" role="button" aria-disabled="true" onclick="confirmar({{ $seguro['seguro_id'] }}, 'seguros')">
                                    <span class="icon text-white-50"><i class="fa-solid fa-trash"></i></span>
                                    <span class="text">Eliminar</span>
                                </a>
                                <a href="/seguros/editar/{{ $seguro['seguro_id'] }}" class="btn btn-warning btn-icon-split" role="button" aria-disabled="true">
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
