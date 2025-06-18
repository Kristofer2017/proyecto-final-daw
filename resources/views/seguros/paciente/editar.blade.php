@extends('layout.app')

@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Editar detalles de tu seguro</h6>
    </div>
    <div class="card-body">
        <form action="/seguros/actualizar" method="post">
            @csrf
            <input type="hidden" name="id" value="{{ $seguroPaciente->id }}">
            <div class="mb-3">
                <label for="seguro_id" class="form-label">Selecciona aseguradora</label>
                <select id="seguro_id" name="seguro_id" class="form-select">
                    @foreach($segurosDisponibles as $seguro)
                        @if($seguro['activo'] == 'Y')
                            <option value="{{ $seguro['seguro_id'] }}"
                            {{ $seguro->seguro_id == $seguroPaciente->seguro_id ? 'selected' : '' }}>{{ $seguro['nombre'] }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="numero_seguro" class="form-label">Numero de su seguro</label>
                <input type="text" class="form-control" id="numero_seguro" name="numero_seguro" required
                value="{{ $seguroPaciente->numero_seguro }}">
            </div>

            <div class="mb-3">
                <label for="tipo_plan" class="form-label">Nombre del plan</label>
                <input type="text" class="form-control" id="tipo_plan" name="tipo_plan" required
                value="{{ $seguroPaciente->tipo_plan }}">
            </div>
            
            <div class="mb-3">
                <label for="estado" class="form-label">Estado con aseguradora</label>
                <select id="estado" name="activo" class="form-select" aria-label="Default select example">
                    <option value="Y" {{ $seguroPaciente->activo == "Y" ? "selected" : "" }}>Activo</option>
                    <option value="N" {{ $seguroPaciente->activo == "N" ? "selected" : "" }}>Inactivo</option>
                </select>
            </div>

            <a href="/seguros" class="btn btn-danger btn-icon-split mr-2">
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