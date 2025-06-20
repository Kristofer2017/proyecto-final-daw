@extends('layout.app')

@section('title', 'Seguros')

@push('css')
    <style>
        .dataTable td {
            vertical-align: middle;
        }
    </style>
@endpush

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
                        <th scope="col">Aseguradora</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Tipo de plan</th>
                        <th scope="col">Numero de Seguro</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($seguros as $seguro)
                        <tr>
                            <td>{{ htmlspecialchars($seguro["nombre"]) }}</td>
                            <td>{{ htmlspecialchars($seguro["telefono"]) }}</td>
                            <td>{{ htmlspecialchars($seguro->pivot["tipo_plan"]) }}</td>
                            <td>{{ htmlspecialchars($seguro->pivot["numero_seguro"]) }}</td>
                            <td>{{ htmlspecialchars($seguro->pivot["activo"] == 'Y' ? 'Activo' : 'Inactivo') }}</td>
                            
                            <td>
                                <div class="d-flex justify-content-center gap-3">
                                <a class="btn btn-danger btn-icon-split" onclick="confirmar({{ $seguro->pivot->id }}, 'seguros')">
                                    <span class="icon text-white-50"><i class="fa-solid fa-trash"></i></span>
                                    <span class="text">Eliminar</span>
                                </a>
                                <a href="/seguros/editar/{{ $seguro->pivot->id }}" class="btn btn-warning btn-icon-split" role="button" aria-disabled="true">
                                    <span class="icon text-white-50"><i class="fa-solid fa-pen"></i></span>
                                    <span class="text">Editar</span>
                                </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
