@extends('layout.app')

@section('content')

<div class="row">
    <div class="col-10 align-self-center">
        <h2>Listado de usuarios</h2>
    </div>
    <div class="col-2 align-self-center">
        <div class="d-grid gap-2">
            <a class="btn btn-primary" role="button" aria-disabled="true" href="/usuarios/crear">Nuevo usuario</a>
        </div>
    </div>
    <div class="col-12">
    <table class="table">
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
                    <td>{{ htmlspecialchars($usuario["correo"]) }}</td>
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
<script>
    function confirmar(id) {
        Swal.fire({
            title: "Esta seguro de eliminar el dato?",
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

@endsection