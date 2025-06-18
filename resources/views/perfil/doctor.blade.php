@extends('layout.app')
@section('title', 'Doctor')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Perfil de Doctor</h6>
    </div>
    <div class="card-body">
        <form action="/perfil/actualizar" method="post" class="form-container">
            @csrf
            <input type="hidden" name="id" value="{{ $usuario['usuario_id'] }}">
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user"
                        placeholder="Nombre" id="nombre" name="nombre" required value="{{ $usuario->nombre }}">
                </div>
                <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user"
                        placeholder="Apellido" id="apellido" name="apellido" required value="{{ $usuario->apellido }}">
                </div>
            </div>

            <div class="form-group">
                <input type="email" class="form-control form-control-user"
                    placeholder="Correo Electrónico" id="email" name="email" required value="{{ $usuario->email }}">
            </div>

            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" placeholder="Licencia" id="licencia" name="licencia" 
                    pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" data-mask="000-000-0000" 
                    value="{{ $usuario->perfilDoctor->licencia }}">
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" placeholder="Especialidad" id="especialidad" name="especialidad"
                    value="{{ $usuario->perfilDoctor->especialidad }}">
                </div>
            </div>
            <div class="form-group">
                <input type="text" class="form-control form-control-user" placeholder="Ubicación" id="ubicacion" name="ubicacion"
                value="{{ $usuario->perfilDoctor->ubicacion }}">
            </div>
            
            <a href="/" class="btn btn-info btn-icon-split mr-2">
                <span class="icon text-white-50"><i class="fa-solid fa-xmark"></i></span>
                <span class="text">Cancelar</span>
            </a>
            <button type="button" class="btn btn-warning btn-icon-split mr-2" id="btn-editar">
                <span class="icon text-white-50"><i class="fas fa-pen"></i></span>
                <span class="text">Habilitar Edición</span>
            </button>
            <button type="submit" class="btn btn-primary btn-icon-split" id="btn-save">
                <span class="icon text-white-50"><i class="fas fa-check"></i></span>
                <span class="text">Guardar</span>
            </button>

            <div class="alert alert-danger mt-5" role="alert">
                Eliminar tu perfil
            </div>

            <p class="text-gray-600">Si deseas eliminar tu cuenta, puedes seleccionar la opción a contunación. Esta acción es permanente y no se puede deshacer.</p>
                
            <a href="/perfil/eliminar" class="btn btn-danger btn-icon-split mr-2" data-toggle="modal" data-target="#deleteProfile">
                <span class="icon text-white-50"><i class="fa-solid fa-trash"></i></span>
                <span class="text">Eliminar Cuenta</span>
            </a>
        </form>

    </div>
</div>

<!-- Delete Modal-->
<div class="modal fade" id="deleteProfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">¿Elimiar Perfil?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Estás a punto de eliminar tu perfil en el sistema. Esta acción es irreversible.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <form action="/perfil/eliminar" method="POST">
                    @csrf
                    <button class="btn btn-danger" type="submit">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@push('js')

<script>
    // Desabilitar opciones y habilitar con click en el boton
    const inputs = document.querySelectorAll('.form-container input');
    const save = document.querySelector('#btn-save');

    document.getElementById('btn-editar').addEventListener('click', function() {
        inputs.forEach(input => {
            input.removeAttribute('disabled');
        });
        save.removeAttribute('disabled');
    });


    document.addEventListener('DOMContentLoaded', function() {
        inputs.forEach(input => {
            input.setAttribute('disabled', true);
        });
        save.setAttribute('disabled', true);
    });
</script>

@endpush