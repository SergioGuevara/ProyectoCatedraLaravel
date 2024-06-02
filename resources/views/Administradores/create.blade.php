@extends('Core/Menu2');
@section('content')
    <!-- Cuerpo de la página -->

    <div class="container py-5">

    @if($empleado)
        <form action="{{ route('updateAdministradores',['id' => $empleado->idadmin]) }}" method="post">
    @else
        <form method="POST" action="/Administradores/store">
    @endif
    @csrf
            @method('PUT')
            <div class="row mb-3">
                <div class="col-4">
                    <label for="nombreEmpleado" class="form-label" >Nombre</label>
                    <input type="text" class="form-control" id="nombreEmpleado" name="nombreEmpleado" value="{{ $empleado->Nombre ?? old('nombreEmpleado') }}">
                    <br>
                    @error('nombreEmpleado')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-4">
                    <label for="apellidoEmpleado" class="form-label">Apellido:</label>
                    <input type="text" class="form-control" id="apellidoEmpleado" name="apellidoEmpleado" value="{{ $empleado->Apellido ?? old('apellidoEmpleado') }}">
                    <br>
                    @error('apellidoEmpleado')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-4">
                    <label for="empleadoEmail" class="form-label">Correo electrónico</label>
                    <input type="email" class="form-control" id="empleadoEmail" name="empleadoEmail" aria-describedby="emailHelp" value="{{ $empleado->Correo ?? old('empleadoEmail') }}">
                    <br>
                    @error('empleadoEmail')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div id="emailHelp" class="form-text">Nunca compartiremos su email con nadie más.</div>
                </div>
                <div class="col-4">
                    <label for="telefonoEmpleado" class="form-label">Telefono:</label>
                    <input type="number" class="form-control" id="telefonoEmpleado" name="telefonoEmpleado" value="{{ $empleado->Telefono ?? old('telefonoEmpleado') }}">
                    <br>
                    @error('telefonoEmpleado')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div id="emailHelp" class="form-text">El número tiene que empezar con 2,7 o 6.</div>
                </div>
            </div>
            @if($empleado)

            <button type="submit" class="btn btn-warning">Modificar</button>
        
            @else
            <button type="submit" class="btn btn-success">Registrar</button>
            @endif
            

        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
@endsection