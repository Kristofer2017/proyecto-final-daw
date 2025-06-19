@extends('layout.app')

@section('title', 'Crear cita')

@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Agendar nueva cita</h6>
    </div>
    <div class="card-body">
        <form action="/citas/guardar" method="post" class="form-container">
            @csrf
            <div class="mb-3">
                <label for="paciente_id" class="form-label">Seleccionar el paciente</label>
                <select id="paciente_id" name="paciente_id" class="form-select">
                    @foreach($pacientes as $paciente)
                        @if($paciente->usuario['activo'] == 'Y')
                            <option {{ $id == $paciente->paciente_id ? 'selected' : '' }} value="{{ $paciente->paciente_id }}">{{ $paciente->usuario['nombre'] }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="nombre" class="form-label">Selecciona la fecha y la hora: </label>
                <input type="text" id="fecha_programada" name="fecha_programada" class="form-control" placeholder="Seleccionar..." required>
            </div>
            <div class="mb-3">
                <label for="nombre" class="form-label">Notas adicionales</label>
                <textarea class="form-control" name="notas" id="notas" placeholder="Si deseas dejar notas adicionales al paciente, puedes hacerlo aquí."></textarea>
            </div>
            <a href="/pacientes" class="btn btn-danger btn-icon-split mr-2">
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
