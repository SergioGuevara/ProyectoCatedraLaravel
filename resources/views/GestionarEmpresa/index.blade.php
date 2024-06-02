@extends('layout.template')
@section('title','Lista de empresa')
@section('content')
@csrf

@if (session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif
    @if($empresas)
    <table class="table table-bordered">
        <tr class="table-dark">
            <th>Empresa</th>
            <th>Contacto</th>
            <th>Telefono</th>
            <th>Correo</th>
            <th>Acción</th>
        </tr>
        @foreach ($empresas as $empresa)
        <tr>
            <td>{{$empresa->nombre}}</td>
            <td>{{$empresa->Nombre}}</td>
            <td>{{$empresa->Telefono}}</td>
            <td>{{$empresa->Correo}}</td>
            <td>
                <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#verinfo{{$empresa->idempresa}}">Detalles</button>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminar{{$empresa->idempresa}}">Eliminar</button>
                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editar{{$empresa->idempresa}}">Editar</button>
            </td>
        </tr>
        @endforeach
    </table>
    <div class="container mt-3 mb-5">
        <button type="button" onclick="window.location.href='/empresas/create'" class="btn btn-success">Añadir Empresa</button>
    </div>    
    @endif


    <!--Área de modales-->
    <!--Eliminar-->
    @foreach ($empresas as $empresa)
    <div class="modal fade" id="eliminar{{$empresa->idempresa}}" tabindex="-1" aria-labelledby="eliminar{{$empresa->idempresa}}Label" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="eliminar{{$empresa->idempresa}}Label">Confirmación de eliminación</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('empresas.destroy', ['idempresa' => $empresa->idempresa]) }}">
                    @csrf
                    @method('DELETE')
                    <center><h4>Estas seguro que deseas eliminar la empresa {{$empresa->nombre}}?</h4></center>
                    <center><button type="submit" class="btn btn-danger">Estoy seguro</button></center>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
            </div>
        </div>
    </div>
    @endforeach

    <!--Modificar-->
    @foreach ($empresas as $empresa)
    <div class="modal fade" id="editar{{$empresa->idempresa}}" tabindex="-1" aria-labelledby="editar{{$empresa->idempresa}}Label" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editar{{$empresa->idempresa}}Label">Modificando empresa {{$empresa->nombre}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('empresas.update', $empresa->idempresa) }}">
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label for="direcEmpresa" class="form-label">Dirección</label>
                            <input type="text" class="form-control" name="direcEmpresa" value="{{$empresa->direccion}}" required>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="nombreEmpresa" class="form-label">Comisión de la Empresa</label>
                            <input type="text" class="form-control" name="comisionEmpresa" value="{{$empresa->comision}}" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4 mb-3">
                            <label for="nombreEmpresa" class="form-label">Nombre de contacto</label>
                            <input type="text" class="form-control" name="nameContacto" id="nameContacto" value="{{$empresa->Nombre}}" required>
                        </div>
                        <div class="col-4 mb-3">
                            <label for="direcEmpresa" class="form-label">Telefono</label>
                            <input type="text" class="form-control" name="telContacto" value="{{$empresa->Telefono}}" required>
                        </div>
                        <div class="col-4 mb-3">
                            <label for="direcEmpresa" class="form-label">Correo</label>
                            <input type="email" class="form-control" name="mailContacto" value="{{$empresa->Correo}}" required>
                        </div>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </form>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
            </div>
        </div>
    </div>
    @endforeach


@endsection
