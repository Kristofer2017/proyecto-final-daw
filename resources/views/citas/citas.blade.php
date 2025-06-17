@extends('layout.app')

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
            <table class="table table-striped dataTable" id="dataTable">
                <thead>
                    <tr>
                        <th scope="col">Fecha y hora</th>
                        <th scope="col">Doctor</th>
                        <th scope="col">Notas</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($citas as $cita)
                        <tr>
                            <td>{{ htmlspecialchars($cita["fecha_programada"]) }}</td>
                            <td>{{ htmlspecialchars($cita["doctor_id"]) }}</td>
                            <td>{{ htmlspecialchars($cita["notas"]) }}</td>
                            <td>{{ htmlspecialchars($cita["estado"]) }}</td>
                            <td>
                                <a class="btn btn-danger" role="button" aria-disabled="true" onclick="confirmar({{ $cita['cita_id'] }})">Cancelar</a>
                                <a href="/usuarios/editar/{{ $cita['cita_id'] }}" class="btn btn-warning" role="button" aria-disabled="true">Reagendar</a>
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
    function confirmar(id) {
        Swal.fire({
            title: "¿Esta seguro de cancelar esta cita?",
            showCancelButton: true,
            confirmButtonText: "Eliminar",
            cancelButtonText: `No`
            }).then((result) => {
            
                if(result.isConfirmed) {
                    location.href = "/usuarios/eliminar/" + id;
                }
        });
    }
</script>

@endpush

