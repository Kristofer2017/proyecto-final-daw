@extends('layout.app')

@section('title', 'Editar rol')

@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Editar rol</h6>
    </div>
    <div class="card-body">
        <form action="/roles/actualizar" method="post" class="form-container">
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
            
            <a href="/roles" class="btn btn-danger btn-icon-split mr-2">
                <span class="icon text-white-50"><i class="fa-solid fa-xmark"></i></span>
                <span class="text">Cancelar</span>
            </a>
            <button type="submit" class="btn btn-primary btn-icon-split">
                <span class="icon text-white-50"><i class="fas fa-check"></i></span>
                <span class="text">Actualizar</span>
            </button>
        </form>
    </div>
</div>

@endsection