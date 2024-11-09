<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amigos son los amigos</title>

    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/3394cb8eb8.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('cs/style.css') }}?v={{ time() }}">
</head>

<body>

    @if (Route::has('login'))
        <div class="top-right">
            @auth
                <a href="{{ url('home_client') }}" class="btn btn-link text-white">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="btn btn-link text-white">Log in</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn btn-link text-white">Register</a>
                @endif
            @endauth
        </div>
    @endif

    <div class="top-right">
        

    


        <a href="{{ route('login') }}" class="btn btn-link text-white">Log in</a>
        <a href="{{ route('register') }}" class="btn btn-link text-white">Register</a>
    </div>

    
    <div class="fondo d-flex flex-column justify-content-center align-items-center">
        <h1 class="titulo_gestor">Bienvenidos a la veterinaria</h1>
        <h2 class="titulo_gestor2 mt-2">Amigos son los Amigos</h2>
    </div>
</body>

</html>


