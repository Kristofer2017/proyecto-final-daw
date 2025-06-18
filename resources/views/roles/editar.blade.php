@extends('layout.app')
@section('title', 'Editar rol')
@section('content')

<div class="row">
    <div class="col-12 align-self-center">
        <h2>Editar rol</h2>
    </div>
    <div class="col-12">
    <form action="/roles/actualizar" method="post">
        @csrf
        <input type="hidden" name="id" value="{{ $rol['rol_id'] }}">
        <div class="mb-3">
            <label for="rol" class="form-label">Nombre rol</label>
            <input type="text" class="form-control" id="rol" value="{{ $rol["nombre"] }}" name="nombre" required>
        </div>
        <div class="mb-3">
            <label for="estado" class="form-label">Seleccionar estado</label>
            <select id="estado" name="activo" class="form-select" aria-label="Default select example">
                <option  {{ $rol["activo"] == "Y" ? "selected" : "" }}  value="Y">Activo</option>
                <option {{ $rol["activo"] == "N" ? "selected" : "" }} value="N">Inactivo</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
    </div>
</div>

@endsection