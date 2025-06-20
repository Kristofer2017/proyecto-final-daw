<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Inicio')</title>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    
    {{-- CSS para todas las paginas --}}
    @include('partials.styles')

    {{-- Por si una vista requiere CSS adicional --}}
    @stack('css')
</head>
<body id="page-top">
    @php
        session_start(); 
    @endphp

    <div id="wrapper">
        @include('layout.sidebar')
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                @include('layout.topbar')

                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
            @include('layout.footer')
        </div>
    </div>

    {{-- JS para todas las paginas --}}
    @include('partials.scripts')
    
    <!-- SweetAlert desde sesiones -->
    @include('partials.alerts')
    
    {{-- Por si una vista requiere JS adicional --}}
    @stack('js')
</body>
</html>