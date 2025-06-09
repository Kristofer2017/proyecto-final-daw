@extends('layout.app')

@section('content')

<div class="row">
    <div class="col-10 align-self-center">
        <h2>Listado de roles</h2>
    </div>
    <div class="col-2 align-self-center">
        <div class="d-grid gap-2">
            <a class="btn btn-primary" role="button" aria-disabled="true" href="/roles/crear">Nuevo rol</a>
        </div>
    </div>
    <div class="col-12">
    <table class="table">
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
                    <td>
                        <a class="btn btn-danger" role="button" aria-disabled="true" onclick="confirmar({{ $rol["rol_id"] }})">Eliminar</a>
                        <a href="/roles/editar/{{ $rol["rol_id"] }}" class="btn btn-warning" role="button" aria-disabled="true">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>
<script>
    function confirmar(id) {
        Swal.fire({
            title: "Esta seguro de eliminar el dato?",
            showCancelButton: true,
            confirmButtonText: "Eliminar",
            cancelButtonText: `No`
            }).then((result) => {
            
                if(result.isConfirmed) {
                    location.href = "/roles/eliminar/" + id;
                }
        });
    }
</script>

@endsection