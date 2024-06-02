<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>La Cuponera!</title>
</head>

<body>

    <header>
        <div class="container-flex py-3 border">
            <div class="nav justify-content-center py-2">
                <h1>La <a style="Color:#E99C2E;">Cuponera</a></h1>
            </div>
            <ul class="nav justify-content-center py-3">

                <li class="nav-item">
                    <a class="nav-link px-5" style="Color:#09080D;" href="{{ route('indexOfertas')}}"><b>Gestionar
                            ofertas</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-5" style="Color:#09080D;" href="{{ route('createAdministradores')}}"><b>Registrar
                            empleados</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-5" style="Color:#09080D;" href="{{ route('indexAdministradores')}}"><b>Gestionar
                            empleados</b></a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle px-5" data-bs-toggle="dropdown" href="#" role="button"
                        aria-expanded="false" style="Color:#09080D;"><b>Cerrar Sesión</b></a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Cerrar Sesión</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </header>

    @yield('content')
</body>

</html>