@extends('layout.template')
@section('title','Añadir Rubro')
@section('content')

<center>
<div class="content p-4 border ">
    <div class="">
        <form method="POST" action="{{ route('rubros.store') }}">
        @csrf
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            <div class="row">
                
                <div class="col-12 mb-3">
                    <label for="nombreRubro" class="form-label">Nombre del Rubro</label>
                    <input type="text" class="form-control" name="nombreRubro" id="nombreRubro" >

                </div>
            </div>
        <button type="submit" class="btn btn-success">Registrar</button>
        </form>
    </div>
</div>
</center>

@endsection
