<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Login')</title>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    {{-- CSS para todas las paginas --}}
    @include('partials.styles')

    {{-- Por si una vista requiere CSS adicional --}}
    @stack('css')
</head>
<body class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row" >
                            <div class="col-lg-6 d-none d-lg-block bg-login-image">
                                {{-- <img src="/imagenes/L1.png" alt="banner"> --}}
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    @yield('content')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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