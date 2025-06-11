@extends('auth.layout')

@section('content')

<div class="text-center">
    <h1 class="h4 text-gray-900 mb-4">Bienvenido!</h1>
</div>
<form class="user" action="/auth/login" method="POST">
    @csrf
    <div class="form-group">
        <input type="email" class="form-control form-control-user"
            id="email" placeholder="Correo electrónico" name="email" required>
    </div>
    <div class="form-group">
        <input type="password" class="form-control form-control-user"
            id="password" placeholder="Contraseña" name="password" required>
    </div>
    <div class="form-group">
        <div class="custom-control custom-checkbox small">
            <input type="checkbox" class="custom-control-input" id="customCheck">
            <label class="custom-control-label" for="customCheck">Recordar usuario</label>
        </div>
    </div>
    <button type="submit" class="btn btn-primary btn-user btn-block">Iniciar sesion</button>
    <hr>
    <a href="/auth/registro" class="btn btn-google btn-user btn-block">Crear Cuenta</a>
</form>
<hr>
<div class="text-center">
    <a class="small" href="#">Recuperar contraseña</a>
</div>
<div class="text-center">
    <a class="small" href="/auth/registro">Crea una cuenta</a>
</div>

@endsection

@push('js')

<script>
    @if (session('success'))
        Swal.fire({
            icon: 'success',
            title: '¡Éxito!',
            text: '{{ session('success') }}'
        });
    @elseif (session('error'))
        Swal.fire({
            icon: 'error',
            title: '¡Error!',
            text: '{{ session('error') }}'
        });
    @endif
</script>

@endpush