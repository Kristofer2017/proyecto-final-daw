@extends('layout.app')

@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Agendar nueva cita</h6>
    </div>
    <div class="card-body">
        <form action="/citas/guardar" method="post" class="px-5 pt-3 pb-4">
            @csrf
            <div class="mb-3">
                <label for="doctor" class="form-label">Seleccionar el doctor</label>
                <select id="doctor" name="doctor" class="form-select">
                    @foreach($doctores as $doctor)
                        @if($doctor->usuario['activo'] == 'Y')
                            <option value="{{ $doctor->doctor_id }}">{{ $doctor->usuario['nombre'] }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="nombre" class="form-label">Selecciona la fecha y la hora</label>
                
                <input type="datetime-local" class="form-control"
                placeholder="Fecha y Hora" id="fecha_programada" name="fecha_programada" required>
            </div>
            <div class="mb-3">
                <label for="nombre" class="form-label">Notas adicionales</label>
                <textarea class="form-control" name="notas" id="notas" placeholder="Si deseas dejar notas adicionales al doctor, puedes hacerlo aquí."></textarea>
            </div>
            <a href="/citas" class="btn btn-danger btn-icon-split mr-2">
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