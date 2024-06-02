<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>@yield('title')</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</head>
<body>
    
    <header>
        <div class="container-flex py-3 border">
            <div class="nav justify-content-center py-2">
                <h1>La <a style="Color:#E99C2E;">Cuponera</a></h1>
            </div>
            <ul class="nav justify-content-center py-3">
                <li class="nav-item">
                    <a class="nav-link px-5" href="/empresas" style="Color:#09080D;"><b>Gestionar Ofertantes</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-5" href="/rubros" style="Color:#09080D;"><b>Gestionar Rubros</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-5" href="/clientes" style="Color:#09080D;"><b>Gestionar clientes</b></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle px-5" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false" style="Color:#09080D;"><b>{{session('user.Nombre')}}</b></a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/logout">Cerrar Sesión</a></li>
                    </ul>
                    
                </li>
            </ul>
        </div>
    </header>
    <!--<ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">({{session('user.usuario')}}) <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="/logout">Cerrar sesion</a></li>
                  
                </ul>
              </li>
            </ul>
        -->
    <!-- Cuerpo de la página -->


    <div class="container mt-5">
        <div class="row mb-5">
            <h3><center>@yield('title')</center></h3>
        </div>
        <div class="row">
            @yield('content')
        </div>
    </div>
    <br><br>
</body>
</html>