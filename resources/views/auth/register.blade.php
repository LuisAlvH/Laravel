<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Amigos son los amigos</title>

    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/3394cb8eb8.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('cs/style.css') }}">
</head>

<body>

    <div class="vh-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 text-black d-flex justify-content-center">
                    <div class="d-flex align-items-center px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">
                        <form class="form_login" method="POST" action="{{ route('register') }}">
                            @csrf
                            <h3 class="mb-2 pb-3 text-center mb-5"><i class="fas fa-user-plus me-4"></i>REGISTRO</h3>

                            <div class="mb-4">
                                <label for="name" class="form-label">Nombre</label>
                                <input id="name" type="text" name="name" class="form-control form-control-lg" required autofocus autocomplete="name" />
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="email" class="form-label">Email</label>
                                <input id="email" type="email" name="email" class="form-control form-control-lg" required autocomplete="username" />
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="telefono" class="form-label">Teléfono</label>
                                <input id="telefono" type="text" name="telefono" class="form-control form-control-lg" required />
                                @error('telefono')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="direccion" class="form-label">Dirección</label>
                                <input id="direccion" type="text" name="direccion" class="form-control form-control-lg" required />
                                @error('direccion')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="mb-4">
                                <label for="password" class="form-label">Contraseña</label>
                                <input id="password" type="password" name="password" class="form-control form-control-lg" required autocomplete="new-password" />
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
                                <input id="password_confirmation" type="password" name="password_confirmation" class="form-control form-control-lg" required autocomplete="new-password" />
                                @error('password_confirmation')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="pt-1 mb-4">
                                <button type="submit" class="btn btn-info btn-lg btn-block w-100 color_inicioSesion_bton rounded-4">Registrarse</button>
                            </div>

                            <p class="text-center">¿Ya tienes una cuenta? <a href="{{ route('login') }}" class="text-muted d-block mt-3"><small class="color_registrate_ahora">Inicia sesión</small></a></p>
                        </form>
                    </div>
                </div>

                <div class="col-sm-6 px-0 d-none d-sm-block">
                    <img src="{{asset('storage/img/5.jpg')}}" alt="imagen de registro de usuario" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
                </div>
            </div>
        </div>
    </div>

</body>

</html>

