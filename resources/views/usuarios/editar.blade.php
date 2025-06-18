@extends('layout.app')
@section('title', 'Editar usuario')
@section('content')

<div class="row">
    <div class="col-12 align-self-center">
        <h2>Editar usuario</h2>
    </div>
    <div class="col-12">
    <form action="/usuarios/actualizar" method="post">
        @csrf
        <input type="hidden" name="id" value="{{ $usuario['usuario_id'] }}">
        <div class="mb-3">
            <label for="rol" class="form-label">Seleccionar rol</label>
            <select id="rol" name="rol_id" class="form-select" aria-label="Default select example">
                @foreach($roles as $rol)
                    @if($rol['activo'] == 'Y')
                        <option {{ $usuario['rol_id'] == $rol['rol_id'] ? 'selected' : '' }} value="{{ $rol['rol_id'] }}"> {{ $rol['nombre'] }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input value="{{ $usuario['nombre'] }}" type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="mb-3">
            <label for="apellido" class="form-label">Apellido</label>
            <input value="{{ $usuario['apellido'] }}" type="text" class="form-control" id="apellido" name="apellido" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Correo</label>
            <input value="{{ $usuario['email'] }}" type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Constraseña</label>
            <input value="{{ $usuario['password'] }}" type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="mb-3">
            <label for="estado" class="form-label">Seleccionar estado</label>
            <select id="estado" name="activo" class="form-select" aria-label="Default select example">
                <option {{ $usuario["activo"] == "Y" ? "selected" : "" }} value="Y">Activo</option>
                <option {{ $usuario["activo"] == "N" ? "selected" : "" }} value="N">Inactivo</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-check"></i>
            </span>
            <span class="text">Actualizar</span>
        </button>
    </form>
    </div>
</div>

@endsection