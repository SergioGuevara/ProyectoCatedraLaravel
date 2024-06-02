@extends('Core/Menu2');
@section('content')

    <div class="container p-4 gx-5">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Correo</th>
                    <th>Telefono</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @if($empleados)
                
                    @foreach($empleados as $empleado)
                <tr>
                    <td>{{$empleado->idadmin}}</td>
                    <td>{{$empleado->Nombre}}</td>
                    <td>{{$empleado->Apellido}}</td>
                    <td>{{$empleado->Correo}}</td>
                    <td>{{$empleado->Telefono}}</td>
                    <td>
                        
                        <a href="{{ route('destroyAdministradores', ['id' => $empleado->idadmin]) }}" class="btn btn-danger"  onclick="return confirmarEliminar(event)">Eliminar</a>
                        <a href="{{ route('FormAdministradores', ['id' => $empleado->idadmin]) }}" class="btn btn-warning">Modificar</a>
                    </td>
                </tr>
                    @endforeach
                @endif
            </tbody>
            <script>
            function confirmarEliminar(event) {
            if (!confirm('¿Estás seguro de que deseas eliminar este empleado?')) {
            event.preventDefault();
                 }
            }
            </script>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
@endsection