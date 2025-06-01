@extends('layout.app')

@section('content')

<div class="row">
    <div class="col-12 align-self-center">
        <h2>Crear usuario</h2>
    </div>
    <div class="col-12">
        <form action="/usuarios/guardar" method="post">
            @csrf
            <div class="mb-3">
                <label for="rol" class="form-label">Seleccionar rol</label>
                <select id="rol" name="rol_id" class="form-select" aria-label="Default select example">
                    @foreach($roles as $rol)
                        @if($rol['activo'] == 'Y')
                            <option value="{{ $rol['rol_id'] }}">{{ $rol['nombre'] }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre usuario</label>
                <input type="text" class="form-control" id="rol" name="nombre" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Constraseña</label>
                <input type="password" class="form-control" id="rol" name="password" required>
            </div>
            <div class="mb-3">
                <label for="estado" class="form-label">Seleccionar estado</label>
                <select id="estado" name="activo" class="form-select" aria-label="Default select example">
                    <option value="Y">Activo</option>
                    <option value="N">Inactivo</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
</div>

@endsection