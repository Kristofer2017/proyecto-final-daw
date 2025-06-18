@extends('layout.app')

@push('css')
<style>
    .actions {
        padding-left: 3rem !important;   
        padding-right: 3rem !important;   
    }
</style>
@endpush

@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">Listado de doctores</h6>
        
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped dataTable">
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Especialidad</th>
                        <th scope="col">Ubicación</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($doctores as $doctor)
                        <tr>
                            <td>{{ htmlspecialchars($doctor->usuario->nombre) }}</td>
                            <td>{{ htmlspecialchars($doctor->usuario->apellido) }}</td>
                            <td>{{ htmlspecialchars($doctor->usuario->email) }}</td>
                            <td>{{ htmlspecialchars($doctor->especialidad) }}</td>
                            <td>{{ htmlspecialchars($doctor->ubicacion) }}</td>
                            

                            <td class="d-flex justify-content-center gap-3 actions">
                                <a href="/usuarios/editar/" class="btn btn-info btn-icon-split">
                                    <span class="icon text-white-50"><i class="fa-regular fa-calendar-check"></i></span>
                                    <span class="text">Agendar</span>
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
