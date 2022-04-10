<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="app.css">

    <title>Sistema de Consulta</title>
</head>

<body>


    {{-- Header --}}
    <header class="py-3 mb-3 border-bottom" style="background-color:#1C639C">
        <div class="container-fluid d-grid gap-3 align-items-center" style="grid-template-columns: 1fr 2fr;">
            <div class="dropdown">
                <img src="https://utn.edu.ar/images/logo-utn.png" alt="logo institucional de la UTN" width="200px">
            </div>

            <div class="d-flex align-items-center">

                <form class="d-flex input-group  w-100 me-3 pe-4">
                    <label class=" bg-danger p-2 px-3 text-white " for="search">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </label>
                    <input type="search" class="form-control rounded-0"
                        placeholder="Buscar por nombre del profesor o materia..." aria-label="Search">




                </form>

                <div class="pe-3 flex-shrink-0 dropdown">
                    <a href="#" class="d-block link-dark text-decoration-none " id="dropdownUser2"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-regular fa-bell  fa-xl text-white"></i>
                    </a>

                    <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
                        <li><a class="dropdown-item" width="32" height="32" href="#">La consulta de las 18:30 fue
                                cancelada</a></li>


                </div>
                <div class="pe-3 flex-shrink-0 dropdown">
                    <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser2"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
                    </a>
                    <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
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

    <div class="content__home my-4 bg-white d-flex align-items-center  rounded shadow w-75 m-auto">
        <div class="image">
            <img src="/image 2.png" width="250" alt="LOGO">
        </div>
        <div class="content__left-side p-2  w-100">
            <form action="#">
                <div class="d-flex mb-3">
                    <label class=" bg-danger p-2 px-3 text-white " for="search">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </label>
                    <input class="form-control rounded-0 w-full" type="search" placeholder="buscar por nombre o materia"
                        name="search" id="search">
                </div>
                <div class="form-group mb-3 w-100">
                    <button class="btn btn-primary rounded-0 w-100">Buscar</button>
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
