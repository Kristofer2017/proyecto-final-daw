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
            <table class="table table-striped" id="dataTable">
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
                            <td>{{ htmlspecialchars($usuario["rol_id"]) }}</td>
                            <td>{{ htmlspecialchars($usuario["activo"] == 'Y' ? 'Activo' : 'Inactivo') }}</td>
                            <td>{{ htmlspecialchars($usuario["fecha_creacion"]) }}</td>
                            <td>
                                <a class="btn btn-danger" role="button" aria-disabled="true" onclick="confirmar({{ $usuario['usuario_id'] }})">Eliminar</a>
                                <a href="/usuarios/editar/{{ $usuario['usuario_id'] }}" class="btn btn-warning" role="button" aria-disabled="true">Editar</a>
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
    let table = new DataTable('#dataTable')

    function confirmar(id) {
        Swal.fire({
            title: "¿Esta seguro de eliminar el dato?",
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

