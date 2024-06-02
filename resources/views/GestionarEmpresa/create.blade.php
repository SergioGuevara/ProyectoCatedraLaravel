@extends('layout.template')
@section('title','Añadir empresa')
@section('content')

<div class="content p-4 border ">
    <div class="">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (isset($errores))
            <div class="alert alert-danger">
                {{ $errores }}
            </div>
        @endif
        <form method="POST" action="{{ route('empresas.store') }}">
        @csrf
            <div class="row">
                <div class="col-6 mb-3">
                    <label for="nombreEmpresa" class="form-label">Nombre de la Empresa</label>
                    <input type="text" class="form-control" name="nameEmpresa" value="{{ old('nameEmpresa') }}">
                </div>
                <div class="col-6 mb-3">
                    <label for="direcEmpresa" class="form-label">Dirección</label>
                    <input type="text" class="form-control" name="direcEmpresa">
                </div>
            </div>
            <div class="row">
                <div class="col-4 mb-3">
                    <label for="nombreEmpresa" class="form-label">Nombre de contacto</label>
                    <input type="text" class="form-control" name="nameContacto" >
                </div>
                <div class="col-4 mb-3">
                    <label for="direcEmpresa" class="form-label">Telefono</label>
                    <input type="text" class="form-control" name="telContacto">
                </div>
                <div class="col-4 mb-3">
                    <label for="direcEmpresa" class="form-label">Correo</label>
                    <input type="email" class="form-control" name="mailContacto">
                </div>
            </div>
            <div class="row">
                <div class="col-6 mb-3">
                    <label for="nombreEmpresa" class="form-label">Rubro</label>
                    <select id="rubroEmpresa" name="rubroEmpresa" class="form-control">
                        @foreach($rubros as $rubro)
                        <option value="{{$rubro->Rubro}}" >{{$rubro->Rubro}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-2 mb-3">
                    <label for="direcEmpresa" class="form-label">% de comisión</label>
                    <input type="text" class="form-control" name="comisionEmpresa">
                </div>
            </div>
            <button type="submit" class="btn btn-success">Registrar</button>
            <h4></h4>
        </form>
    </div>
</div>

@endsection