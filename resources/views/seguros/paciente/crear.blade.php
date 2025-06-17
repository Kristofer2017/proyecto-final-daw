@extends('layout.app')

@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Crear nuevo seguro</h6>
    </div>
    <div class="card-body">
        <form action="/seguros/guardar" method="post">
            @csrf
            <div class="mb-3">
                <label for="nombre" class="form-label">Aseguradora</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>

            <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="text" class="form-control" id="telefono" name="telefono" pattern="[0-9]{4}-[0-9]{4}" data-mask="0000-0000" >
            </div>
            
            <div class="mb-3">
                <label for="estado" class="form-label">Seleccionar estado</label>
                <select id="estado" name="activo" class="form-select" aria-label="Default select example">
                    <option value="Y">Activo</option>
                    <option value="N">Inactivo</option>
                </select>
            </div>
            <a href="/seguros" class="btn btn-danger btn-icon-split mr-2">
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