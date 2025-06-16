@extends('layout.app')

@section('content')

<div class="text-center">
    <div class="error mx-auto">403</div>
    <p class="lead text-gray-800 mb-5">Acceso Denegado</p>
    <p class="text-gray-500 mb-0">{{ $mensaje }}</p>
    <a href="/">&larr; Regresar al Inicio</a>
</div>

@endsection