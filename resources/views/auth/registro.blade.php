@extends('auth.layout')

@section('title', 'Registro')

@push('css')

<style>
    select#rol{
        border-radius: 1.5rem;
        padding: 0.70rem 1rem;
        font-size: 1rem;
    }
</style>

@endpush

@section('content')

<div class="text-center">
    <h1 class="h4 text-gray-900 mb-4">Crear una cuenta</h1>
</div>
<form class="user register-form" action="/auth/register" method="POST">
    @csrf
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="text" class="form-control form-control-user" 
                placeholder="Nombre" id="nombre" name="nombre" required>
        </div>
        <div class="col-sm-6">
            <input type="text" class="form-control form-control-user" 
                placeholder="Apellido" id="apellido" name="apellido" required>
        </div>
    </div>

    <div class="form-group">
        <input type="email" class="form-control form-control-user"
            placeholder="Correo Electrónico" id="email" name="email" required>
    </div>

    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="password" class="form-control form-control-user"
                placeholder="Contraseña" id="password" name="password" required onChange="onChange()">
        </div>
        <div class="col-sm-6">
            <input type="password" class="form-control form-control-user"
                placeholder="Repetir Contraseña" id="password_confirmation" name="password_confirmation" required onChange="onChange()">
        </div>
    </div>

    <div class="form-group text-center">
        <label for="rol" class="form-label text-gray-800">Seleccionar rol</label>
        <select id="rol" name="rol_id" class="form-select form-control-user text-gray-600" required>
            @foreach($roles as $rol)
                @if($rol['activo'] == 'Y')
                    <option value="{{ $rol['rol_id'] }}">{{ $rol['nombre'] }}</option>
                @endif
            @endforeach
        </select>
    </div>

    <div id="imputs-adicionales"></div>
<div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="tel" class="form-control form-control-user" placeholder="Numero de Teléfono" id="telefono" name="telefono" pattern="[0-9]{4}-[0-9]{4}" data-mask="0000-0000" required>
                    </div>
    <hr>
    <button type="submit" class="btn btn-primary btn-user btn-block">Registrar Cuenta</button>
    <hr>
    <a href="/auth/login" class="btn btn-google btn-user btn-block">Iniciar Sesión</a>
</form>
<hr>
<div class="text-center">
    <a class="small" href="#">Recuperar contraseña</a>
</div>
<div class="text-center">
    <a class="small" href="/auth/login">Iniciar Sesión</a>
</div>

@endsection

@push('js')
    <script>
        @if (session('error'))
            Swal.fire({
                icon: 'error',
                title: '¡Error!',
                text: '{{ session('error') }}'
            });
        @endif

        const password = document.getElementById('password');
        const confirm = document.getElementById('password_confirmation');
        const contenedor = document.getElementById('imputs-adicionales');
        const selector =  document.getElementById('rol');
        const secciones = {
            1: `
                <div class="form-group row text-center" >
                    <label class="form-label text-gray-800 my-3">Numero y fecha de nacimiento</label>
                    
                    <div class="col-sm-6">
                        <input type="date" class="form-control form-control-user" placeholder="Fecha de nacimiento" id="fecha_nacimiento" name="fecha_nacimiento" required>
                    </div>
                </div>
                `,
            2: `
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="tel" class="form-control form-control-user" placeholder="Licencia" id="licencia" name="licencia" pattern="[0-9]{10}" data-mask="0000000000" required>
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user" placeholder="Especialidad" id="especialidad" name="especialidad" required>
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" placeholder="Ubicación" id="ubicacion" name="ubicacion" required>
                </div>
                `
        }

        function onChange() {
            if (confirm.value === password.value) {
                confirm.setCustomValidity('');
            } else {
                confirm.setCustomValidity('La contraseña no coincide');
            }
        }

        function cargarFormulario() {
            const valor = selector.value;
            contenedor.innerHTML = secciones[valor] || '';
        }

        selector.addEventListener('change', cargarFormulario);
        document.addEventListener('DOMContentLoaded', cargarFormulario);
    </script>
@endpush