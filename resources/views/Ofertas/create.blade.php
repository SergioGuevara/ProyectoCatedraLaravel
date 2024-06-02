@extends('Core/Menu2');
@section('content')
<div class="container py-5">
    <form method="POST" action="/Ofertas/store" enctype="multipart/form-data">
        @csrf
            <div class="mb-3">
                <label for="titulo_oferta" class="form-label">Titulo de la oferta:</label>
                <input type="text" class="form-control" name="titulo_oferta" id="titulo_oferta" value="{{ old('titulo_oferta') }}">
                @if ($errors->has('titulo_oferta'))
                    <span class="text-danger">{{ $errors->first('titulo_oferta') }}</span>
                @endif
            </div>
            <div class="row mb-3">
                <label for="descripcion_oferta">Descripción:</label>
                <textarea id="descripcion" class="form-control" name="descripcion_oferta" id="descripcion_oferta" rows="10" cols="40" value="{{ old('descripcion_oferta') }}"></textarea>
                @if ($errors->has('descripcion_oferta'))
                    <span class="text-danger">{{ $errors->first('descripcion_oferta') }}</span>
                @endif
            </div>
            <div class="row mb-3">
                <div class="col-4">
                    <label for="empresa_oferta" class="form-label">Codigo de Empresa: {{session('user.idempresa')}}</label>
                    <!--<input type="text" class="form-control" id="precio_normal" name="precio_normal" value="{{session('user.idempresa')}}" disable>-->
                    <!--<select name="empresa_oferta" id="empresa_oferta" class="form-select">
                        @foreach ($empresas as $empresa)
                            <option value="{{$empresa->idempresa}}" {{ old('empresa_oferta') == $empresa->idempresa ? 'selected' : '' }}>{{$empresa->nombre}}</option>
                        @endforeach
                    </select>-->
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-4">
                    <label for="precio_normal" class="form-label">Precion normal:</label>
                    <input type="number" class="form-control" id="precio_normal" name="precio_normal" value="{{ old('precio_normal') }}">
                    @if ($errors->has('precio_normal'))
                        <span class="text-danger">{{ $errors->first('precio_normal') }}</span>
                    @endif
                </div>
                <div class="col-4">
                    <label for="precio_oferta" class="form-label">Precion con oferta:</label>
                    <input type="number" class="form-control" id="precio_oferta" name="precio_oferta" value="{{ old('precio_oferta') }}">
                    @if ($errors->has('precio_oferta'))
                        <span class="text-danger">{{ $errors->first('precio_oferta') }}</span>
                    @endif
                </div>
                <div class="col-4">
                    <label for="precio_cupon" class="form-label">Precio con cupon:</label>
                    <input type="number" class="form-control" id="precio_cupon" name="precio_cupon" value="{{ old('precio_cupon') }}">
                    @if ($errors->has('precio_cupon'))
                        <span class="text-danger">{{ $errors->first('precio_cupon') }}</span>
                    @endif
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-4">
                    <label for="fecha_inicio" class="form-label">Inicio de venta:</label>
                    <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" name="cantidaCupones" value="{{ old('fecha_inicio') }}">
                    @if ($errors->has('fecha_inicio'))
                        <span class="text-danger">{{ $errors->first('fecha_inicio') }}</span>
                    @endif
                </div>
                <div class="col-4">
                    <label for="fecha_final" class="form-label">Fin de venta:</label>
                    <input type="date" class="form-control" id="fecha_final" name="fecha_final" name="cantidaCupones" value="{{ old('fecha_final') }}">
                    @if ($errors->has('fecha_final'))
                        <span class="text-danger">{{ $errors->first('fecha_final') }}</span>
                    @endif                </div>
                <div class="col-4">
                    <label for="fecha_caducidad" class="form-label">Fecha de caducidad:</label>
                    <input type="date" class="form-control" id="fecha_caducidad" name="fecha_caducidad" name="cantidaCupones" value="{{ old('fecha_caducidad') }}">
                    @if ($errors->has('fecha_caducidad'))
                        <span class="text-danger">{{ $errors->first('fecha_caducidad') }}</span>
                    @endif                </div>
            </div>
            <div class="row mb-3">
                <div class="col-4">
                    <label for="cantida_cupones" class="form-label">Cantidad disponible:</label>
                    <input type="text" class="form-control" id="cantida_cupones" name="cantida_cupones"  value="{{ old('cantida_cupones') }}">
                    @if ($errors->has('cantida_cupones'))
                        <span class="text-danger">{{ $errors->first('cantida_cupones') }}</span>
                    @endif                </div>
                <div class="col-4">
                    <label for="imagen_oferta" class="form-label">Imagen:</label>
                    <input type="file" class="form-control" name="imagen_oferta" value="{{ old('imagen_oferta') }}">
                    @if ($errors->has('imagen_oferta'))
                        <span class="text-danger">{{ $errors->first('imagen_oferta') }}</span>
                    @endif
                </div>
            </div>
            <button type="submit" class="btn btn-success">Registrar</button>


        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    @endsection