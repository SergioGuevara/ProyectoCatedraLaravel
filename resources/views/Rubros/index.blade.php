@extends('layout.template')
@section('title','Lista de Rubros')
@section('content')

    @if($rubros)
    <table class="table table-border">
        <thead>
            <tr class="table-dark">
                <th scope="col">Rubro</th>
                <th scope="col">Eliminar Rubro</th>
                <th scope="col">Editar Rubro</th>
            </tr>
        </thead>
        @foreach ($rubros as $rubro)

        <tbody>
            <tr>
                <td>{{$rubro->Rubro}}</td>
                <td>
                <form method="POST" action="{{ route('rubros.destroy', ['idrubro' => $rubro->idrubro]) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" >Eliminar</button>
                </form>
                    <!--<button onclick type="button" class="btn btn-danger">Eliminar</button>-->
                </td>
                <td >
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editar{{$rubro->idrubro}}">Editar</button>
                </td>
            </tr>
        </tbody>
        @endforeach
    </table>
    
    <div class="container mt-3">
        <button onclick="window.location.href='/rubros/create'" type="button" class="btn btn-success" >Añadir Rubro</button>
    </div>

    @foreach($rubros as $rubro)
    <!-- Modal -->
    <div class="modal fade" id="editar{{$rubro->idrubro}}" tabindex="-1" aria-labelledby="editar{{$rubro->idrubro}}Label" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editar{{$rubro->idrubro}}Label">Editando rubro de {{$rubro->Rubro}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

            <form action="{{ route('rubros.update', $rubro->idrubro) }}" method="POST">
                <input type="text" class="form-control" name="nombreRubro" id="nombreRubro" value="{{$rubro->Rubro}}">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </form>
                <!--<button type="button" class="btn btn-primary">Guardar cambios</button>-->
            </div>
            </div>
        </div>
    </div>
    @endforeach

    @endif
@endsection