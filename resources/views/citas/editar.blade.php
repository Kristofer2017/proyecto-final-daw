@extends('layout.app')
@section('title', 'Editar cita')
@push('css')
<style>
    input#fecha_programada {
        display: inline;
        width: 12rem;
        margin-left: 1rem;
    }
</style>
@endpush

@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Reagendar Cita</h6>
    </div>
    <div class="card-body">
        <form action="/citas/actualizar" method="post" class="form-container">
            @csrf
            <input type="hidden" name="id" value="{{ $cita->cita_id }}">

            <div class="mb-3">
                <label for="doctor_id" class="form-label">Seleccionar el doctor</label>
                <select id="doctor_id" name="doctor_id" class="form-select">
                    @foreach($doctores as $doctor)
                        @if($doctor->usuario['activo'] == 'Y')
                            <option {{ $doctor->doctor_id == $cita->doctor_id ? 'selected' : '' }} value="{{ $doctor->doctor_id }}">{{ $doctor->usuario['nombre'] }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="nombre" class="form-label">Selecciona la fecha y la hora: </label>
                <input type="text" id="fecha_programada" name="fecha_programada" class="form-control" placeholder="Seleccionar..." required
                value="{{ $cita->fecha_programada }}">
            </div>

            <div class="mb-3">
                <label for="nombre" class="form-label">Notas adicionales</label>
                <textarea class="form-control" name="notas" id="notas" placeholder="Si deseas dejar notas adicionales al doctor, puedes hacerlo aquí.">{{ $cita->notas }}</textarea>
            </div>

            <a href="/citas" class="btn btn-danger btn-icon-split mr-2">
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

@push('js')

<script>
    flatpickr("#fecha_programada", {
        enableTime: true,
        dateFormat: "Y-m-d H:i",
        minDate: "today"
    });
</script>

@endpush