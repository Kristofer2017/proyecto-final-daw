@extends('layout.app')

@section('title', 'Crear usuario')

@push('css')
    <style>
        .form-container {
            padding-top: 0.7rem;
        }

        select#estado {
            display: inline-block !important;
            width: 17% !important;
            margin-left: 1rem;
        }
    </style>
@endpush

@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Crear usuario</h6>
    </div>
    <div class="card-body">
        <form action="/usuarios/guardar" method="post" class="form-container">
            @csrf
            {{-- Campos para cualquier tipo de usuario --}}
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

            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="email" class="form-control form-control-user"
                        placeholder="Correo Electrónico" id="email" name="email" required>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user"
                        placeholder="Contraseña" id="password" name="password" required>
                </div>
            </div>

            <div class="form-group">
                <label for="estado" class="form-label text-gray-800">Seleccionar estado</label>
                <select id="estado" name="activo" class="form-select form-control-user text-gray-600" aria-label="Default select example">
                    <option value="Y">Activo</option>
                    <option value="N">Inactivo</option>
                </select>
            </div>

            <div class="form-group">
                <label for="rol" class="form-label text-gray-800">Seleccionar rol</label>
                <select id="rol" name="rol_id" class="form-select form-control-user text-gray-600" required>
                    @foreach($roles as $rol)
                        @if($rol['activo'] == 'Y')
                            <option value="{{ $rol['rol_id'] }}">{{ $rol['nombre'] }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            {{-- Inputs para el rol de paciente --}}
            <div id="paciente">
                <div class="form-group row text-center" >
                    <label for="telefono" class="form-label text-gray-800 my-3">Numero y fecha de nacimiento</label>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user" placeholder="Numero de Teléfono" id="telefono" name="telefono" pattern="[0-9]{4}-[0-9]{4}" data-mask="0000-0000" >
                    </div>
                    <div class="col-sm-6">
                        <input type="date" class="form-control form-control-user" placeholder="Fecha de nacimiento" id="fecha_nacimiento" name="fecha_nacimiento" >
                    </div>
                </div>
            </div>
            
            {{-- Inputs para el rol de doctor --}}
            <div id="doctor">
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user" placeholder="Licencia" id="licencia" name="licencia" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" data-mask="000-000-0000" >
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user" placeholder="Especialidad" id="especialidad" name="especialidad" >
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" placeholder="Ubicación" id="ubicacion" name="ubicacion" >
                </div>
            </div>

            <hr>
            <a href="/usuarios" class="btn btn-danger btn-icon-split mr-2">
                <span class="icon text-white-50"><i class="fa-solid fa-xmark"></i></span>
                <span class="text">Cancelar</span>
            </a>
            <button type="submit" class="btn btn-primary btn-icon-split">
                <span class="icon text-white-50"><i class="fas fa-check"></i></span>
                <span class="text">Guardar</span>
            </button>
        </form>
    </div>
</div>

@endsection

@push('js')
    <script>
        const contenedor = document.getElementById('imputs-adicionales');
        const selectorRol =  document.getElementById('rol');
        const formDoctor =  document.getElementById('doctor');
        const formPaciente =  document.getElementById('paciente');

        function cargarSeccion() {
            const valor = selectorRol.value;
            
            // Se ocultan ambas secciones y luego se muestran basadas en el rol
            formDoctor.style.display = 'none';
            formPaciente.style.display = 'none';

            // Agregamos required a todos los campos
            document.querySelectorAll('#doctor input, #paciente input').forEach(el => {
                el.setAttribute('required', true);
            });
            
            if (valor == 2) {
                document.getElementById('doctor').style.display = 'block';
                document.querySelectorAll('#paciente input').forEach(el => {
                    el.removeAttribute('required'); // Quitamos el required de los campos del paciente
                });
            } else {
                document.getElementById('paciente').style.display = 'block';
                document.querySelectorAll('#doctor input').forEach(el => {
                    el.removeAttribute('required'); // Quitamos el required de los campos del paciente
                });
            }
        }

        selectorRol.addEventListener('change', cargarSeccion);
        document.addEventListener('DOMContentLoaded', cargarSeccion);
    </script>
@endpush