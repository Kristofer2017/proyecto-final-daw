@extends('layout.app')

@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Perfil de Paciente</h6>
    </div>
    <div class="card-body">
        <form action="/citas/guardar" method="post" class="form-container">
            @csrf
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" disabled
                        placeholder="Nombre" id="nombre" name="nombre" required value="{{ $usuario->nombre }}">
                </div>
                <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" disabled
                        placeholder="Apellido" id="apellido" name="apellido" required value="{{ $usuario->apellido }}">
                </div>
            </div>

            <div class="form-group">
                <input type="email" class="form-control form-control-user" disabled
                    placeholder="Correo Electrónico" id="email" name="email" required value="{{ $usuario->email }}">
            </div>

            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" disabled
                        placeholder="Contraseña" id="password" name="password" required onChange="onChange()">
                </div>
                <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" disabled
                        placeholder="Repetir Contraseña" id="password_confirmation" name="password_confirmation" required onChange="onChange()">
                </div>
            </div>
    
            <div class="form-group row text-center mb-4">
                <label for="rol" class="form-label text-gray-800 my-3">Numero de teléfono y fecha de nacimiento</label>
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="tel" class="form-control form-control-user" disabled
                        placeholder="Numero de Teléfono" id="telefono" name="telefono" required
                        pattern="[0-9]{4}-[0-9]{4}" data-mask="0000-0000" value="{{ $usuario->perfilPaciente->telefono }}">
                </div>
                <div class="col-sm-6">
                    <input type="date" class="form-control form-control-user" disabled
                        placeholder="Fecha de nacimiento" id="fecha_nacimiento" name="fecha_nacimiento" required value="{{ $usuario->perfilPaciente->fecha_nacimiento }}">
                </div>
            </div>
            
            <a href="/" class="btn btn-danger btn-icon-split mr-2">
                <span class="icon text-white-50"><i class="fa-solid fa-xmark"></i></span>
                <span class="text">Cancelar</span>
            </a>
            <button type="button" class="btn btn-warning btn-icon-split mr-2" id="btn-editar">
                <span class="icon text-white-50"><i class="fas fa-pen"></i></span>
                <span class="text">Habilitar Edición</span>
            </button>
            <button type="submit" class="btn btn-primary btn-icon-split" id="btn-save" disabled>
                <span class="icon text-white-50"><i class="fas fa-check"></i></span>
                <span class="text">Guardar</span>
            </button>
        </form>
    </div>
</div>

@endsection

@push('js')

<script>
    document.getElementById('btn-editar').addEventListener('click', function() {
        // Selecciona todos los inputs dentro del formulario
        const inputs = document.querySelectorAll('.form-container input');
        const save = document.querySelector('#btn-save');

        inputs.forEach(input => {
            input.removeAttribute('disabled');
        });
        save.removeAttribute('disabled');
    });
</script>

@endpush