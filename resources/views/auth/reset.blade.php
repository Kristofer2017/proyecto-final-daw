@extends('auth.layout')

@section('title', 'Reestablecer')

@section('content')

<div class="text-center">
    <h1 class="h4 text-gray-900 mb-2">¿Olvidó su contraseña?</h1>
    <p class="mb-4 text-gray-600">Ingresa tu correo electrónico registrado en el sistema y te enviaremos las instrucciones para restablecerla.</p>
</div>
<form class="user">
    <div class="form-group">
        <input type="email" class="form-control form-control-user"
            id="exampleInputEmail" aria-describedby="emailHelp"
            placeholder="Correo Electrónico">
    </div>
    <a href="#" class="btn btn-primary btn-user btn-block">
        Enviar Correo
    </a>
</form>
<hr>
<div class="text-center">
    <a class="small" href="/auth/registro">Crea una cuenta</a>
</div>
<div class="text-center">
    <a class="small" href="/auth/login">Iniciar Sesión</a>
</div>

@endsection