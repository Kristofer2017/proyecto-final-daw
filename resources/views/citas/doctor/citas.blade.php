@extends('layout.app')

@section('title', 'Citas')

@push('css')
<style>
    .actions {
        padding-left: 5.5rem !important;   
        padding-right: 5.5rem !important;   
    }

    .dataTable td {
        vertical-align: middle;
    }
</style>
@endpush

@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">Mis citas</h6>
        <a class="btn btn-primary btn-icon-split" role="button" aria-disabled="true" href="/citas/crear">
            <span class="icon text-white-50"><i class="fas fa-plus"></i></span>
            <span class="text">Nueva cita</span>
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped dataTable">
                <thead>
                    <tr>
                        <th scope="col">Fecha y hora</th>
                        <th scope="col">Paciente</th>
                        <th scope="col">Notas</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($citas as $cita)
                        <tr>
                            <td>{{ htmlspecialchars($cita["fecha_programada"]) }}</td>
                            <td>{{ htmlspecialchars($cita->paciente->usuario->nombre) }}</td>
                            <td>{{ htmlspecialchars($cita["notas"]) }}</td>
                            <td>{{ htmlspecialchars($cita["estado"]) }}</td>

                            <td>
                                <div class="d-flex justify-content-center gap-3">
                                    <a class="btn btn-primary btn-circle
                                    {{ $cita->estado == 'Cancelada' || $cita->estado == 'Completada' ? 'disabled' : '' }}"
                                    onclick="confirmar({{ $cita['cita_id'] }}, 'completar')">
                                        <i class="fas fa-check"></i>
                                    </a>
                                    
                                    <a class="btn btn-danger btn-circle 
                                    {{ $cita->estado == 'Cancelada' || $cita->estado == 'Completada' ? 'disabled' : '' }}" 
                                    onclick="confirmar({{ $cita['cita_id'] }}, 'cancelar')">
                                        <i class="fa-solid fa-xmark"></i>
                                    </a>
                                    <a class="btn btn-warning btn-circle 
                                    {{ $cita->estado == 'Cancelada' || $cita->estado == 'Completada' ? 'disabled' : '' }}" 
                                    href="/citas/editar/{{ $cita['cita_id'] }}">
                                        <i class="fa-regular fa-calendar-check"></i>
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


@push('js')

<script>
    function confirmar(id, accion) {
        Swal.fire({
            title: "¿Esta seguro de "+accion+" esta cita?",
            showCancelButton: true,
            confirmButtonText: "Confirmar",
            cancelButtonText: `No`
            }).then((result) => {
            
                if(result.isConfirmed) {
                    location.href = "/citas/"+accion+"/" + id;
                }
        });
    }
</script>

@endpush

