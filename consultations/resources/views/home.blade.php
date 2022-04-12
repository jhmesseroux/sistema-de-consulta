<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Sistema de Consulta</title>
</head>
<body>


    {{-- Header --}}
    <header class="py-3 mb-3 border-bottom" style="background-color:#1C639C">
        <div class="container-fluid grid gap-3 items-center" style="grid-template-columns: 1fr 2fr;">
            <div class="dropdown">
                <img src="https://utn.edu.ar/images/logo-utn.png" alt="logo institucional de la UTN" width="200px">
            </div>

            <div class="flex items-center">

                <form class="flex input-group  w-100 me-3 pe-4">
                    <label class="bg-red-500 p-2 px-3 text-white " for="search">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </label>
                    <input type="search" class="form-control rounded-0"
                        placeholder="Buscar por nombre del profesor o materia..." aria-label="Search">

                </form>
                  @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                    @endif
            @endif
        </div>
        @endif

                <div class="pe-3 flex-shrink-0 dropdown">
                    <a href="#" class="block link-dark text-decoration-none " id="dropdownUser2"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-regular fa-bell  fa-xl text-white"></i>
                    </a>

                    <ul class="dropdown-menu hidden text-sm shadow" aria-labelledby="dropdownUser2">
                        <li><a class="dropdown-item" width="32" height="32" href="#">La consulta de las 18:30 fue
                                cancelada</a></li>


                </div>
                <div class="pe-3 flex-shrink-0 dropdown">
                    <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser2"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
                    </a>
                    <ul class="dropdown-menu hidden text-small shadow" aria-labelledby="dropdownUser2">
                        <li><a class="dropdown-item" href="#">Nueva consulta...</a></li>
                        <li><a class="dropdown-item" href="#">Perfil</a></li>
                        <li><a class="dropdown-item" href="#">Configuración</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Salir</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

    {{-- main content --}}

    <div class="content__home my-4 bg-white flex items-center  rounded shadow w-75 m-auto">
        <div class="image">
            <img src="/image 2.png" width="250" alt="LOGO">
        </div>
        <div class="content__left-side p-2  w-100">
            <form action="#">
                <div class="flex mb-3">
                    <label class="bg-red-500 p-2 px-3 text-white " for="search">
                       <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
  <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
</svg>
                    </label>
                    <input class="form-control rounded-0 w-full" type="search" placeholder="buscar por nombre o materia"
                        name="search" id="search">
                </div>
                <div class="form-group mb-3 w-100">
                    <button class="btn btn-blue-500 rounded-0 w-100">Buscar</button>
                </div>
            </form>
        </div>
    </div>

    {{-- fooer --}}

    <footer class="bg-danger">
        <div class="container bg-primary p-1">
            <div class="row  p-1 m-auto w-90">
                <div class="col-md-3 col">
                    <img alt="Logo de UTN FRRo" width="100%"
                        src="https://frro.cvg.utn.edu.ar/pluginfile.php/1/theme_snap/logo/1636394775/logo-utn-siglas.png" />
                </div>
                <div class="col-md-3  col">
                    <ul>
                        <li><a href="/" title="Inicio">Inicio</a></li>
                        <li><a href="#" title="-">Otras páginas</a></li>
                    </ul>
                </div>
                <div class="col-md-3 col">
                    <ul>
                        <li><a href="/terms-and-conditions" title="Términos y condiciones">Términos y condiciones</a>
                        </li>
                        <li><a href="/sitemap" title="">Mapa del sitio</a></li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <span>© 2022</span>
                </div>
                <div class="col-6">
                    <span>UTN - Facultad Regional Rosario</span>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>
