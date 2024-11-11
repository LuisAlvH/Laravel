<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amigos son los amigos</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/3394cb8eb8.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('cs/style.css') }}">
</head>

<body>
    <div class="wrapper">
        <aside id="sidebar">
            <div class="d-flex">
                <button class="toggle-btn" type="button">
                    <i class="lni lni-grid-alt"></i>
                </button>
            </div>
            <ul class="sidebar-nav my-5">
                <li class="sidebar-item my-4">
                    <a href="{{route('home_client')}}" class="sidebar-link">
                        <i class="fa-solid fa-house"></i>
                        <span>Inicio</span>
                    </a>
                </li>
                <li class="sidebar-item my-4">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#auth" aria-expanded="false" aria-controls="auth">
                        <i class="fa-duotone fa-solid fa-dog"></i>
                        <span>Mascotas</span>
                    </a>
                    <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                            <a href="{{route('viewPets')}}" class="sidebar-link">VER MASCOTAS </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item my-4">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#multi" aria-expanded="false" aria-controls="multi">
                        <i class="fa-solid fa-file"></i>
                        <span>Facturas</span>
                    </a>
                    <ul id="multi" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="{{route('viewInvoices')}}" class="sidebar-link">VER FACTURAS </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item my-5">
                    <a href="{{route('clientProfile')}}" class="sidebar-link">
                        <i class="fa-solid fa-user"></i>
                        <span>Mi cuenta</span>
                    </a>
                </li>
            </ul>
            <div class="sidebar-footer">
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>

<a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="sidebar-link">
<i class="lni lni-exit"></i>
</a>

            </div>
        </aside>

        <div class="container main p-3">
            <div class="row">
                <div class="row">
                    <div class="col-12 d-flex justify-content-end my-3">
                        <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                            <ul class="navbar-nav flex-row align-items-center ms-auto">
                                <li class="nav-item lh-1 me-4">
                                    <h2 class="fw-bold text-warning mb-0">
                                        ¡Bienvenido, {{ Auth::user()->name }}!
                                    </h2>
                                </li>
                                <li>
                                    <a class="nav-link dropdown-toggle hide-arrow p-0" href="javascript:void(0);"
                                        data-bs-toggle="dropdown">
                                        <div>
                                            <img src="{{asset('storage/usser_1.jpg')}}" alt="foto de perfil de cliente"
                                                class="rounded-circle imagen_usser">
                                        </div>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <div class="d-flex">
                                                <div class="flex-grow-1 text-center">
                                                    <h6>{{ Auth::user()->name }}</h6>
                                                    <small class="text-muted">Cliente</small>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="dropdown-divider my-1"></div>
                                        </li>
                                        <li>
                                            <a class="dropdown-item hover_drop_cliente" href="{{route('clientProfile')}}">
                                                <i class="bx bx-user bx-md me-3"></i><span>MI PERFIL</span>
                                            </a>
                                        </li>
                                        <li>
                                            <div class="dropdown-divider my-1"></div>
                                        </li>
                                        <li>
                                            <a class="dropdown-item hover_drop_cliente" href="{{ route('logout') }}"
                                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                <i class="bx bx-power-off bx-md me-3"></i><span>Logout</span>
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>

    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>
