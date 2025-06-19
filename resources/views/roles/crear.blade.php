@extends('layout.app')

@section('title', 'Crear rol')

@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Crear rol</h6>
    </div>
    <div class="card-body">
        <form action="/roles/guardar" method="post">
            @csrf
            <div class="mb-3">
                <label for="rol" class="form-label">Nombre rol</label>
                <input type="text" class="form-control" id="rol" name="nombre" required>
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