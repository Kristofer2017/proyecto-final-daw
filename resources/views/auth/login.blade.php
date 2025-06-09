<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @include('partials.styles')
</head>
<body class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row" >
                            <div class="col-lg-6 d-none d-lg-block bg-login-image">
                                {{-- <img src="" alt="banner"> --}}
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
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
                                        <a href="" class="btn btn-google btn-user btn-block">Crear Cuenta</a>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="">Recuperar contraseña</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="">Crea una cuenta</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('partials.scripts')
</body>
</html>