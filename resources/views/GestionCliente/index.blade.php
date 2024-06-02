@extends('layout.template')
@section('title','Lista de Clientes')
@section('content')

    <!-- Cuerpo de la página -->


    @if($clientes)
    <div class="container mt-4">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">IDCliente</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Dirección</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            @php $i = 1; @endphp
            @foreach ($clientes as $cliente)
            <tbody>
                <tr>
                    <td>{{$i}}</td>
                    <td>{{$cliente->idcliente}}</td>
                    <td>{{$cliente->nombre}}</td>
                    <td>{{$cliente->apellido}}</td>
                    <td>{{$cliente->correo}}</td>
                    <td>{{$cliente->direccion}}</td>
                    <td><button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#vercupones{{$cliente->idcliente}}">Ver cupones</button></td>
                </tr>
            </tbody>
            
            @php $i++; @endphp
            @endforeach
        </table>
    </div>
    @endif
    
    @foreach ($clientes as $cliente)
    <!-- Modal -->
    <div class="modal fade" id="vercupones{{$cliente->idcliente}}" tabindex="-1" aria-labelledby="vercupones{{$cliente->idcliente}}Label" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="vercupones{{$cliente->idcliente}}Label">Estado de cupones del cliente {{$cliente->nombre}} </span></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

        <!-- Sesión de Cupones Disponibles -->
        <div class="card" style="width: 100%; background-color: #EBA753">
			<div class="card-body">
                <h5>Cupones Disponibles</h5>
			</div>
        </div>
        @if(count($cliente->cuponesDisponibles($cliente->idcliente))==0)
            <div class="container p-5" >
				<center><?= "No posee cupones disponibles que mostrar" ?></center>
			</div>
        @endif
        @foreach ($cliente->cuponesDisponibles($cliente->idcliente) as $cupon)
        <div class="container p-4 gx-5">
			<div class="row p-4 ">
                <div class="col-7 p-4">
                    <div class="row">
                        <h3 class="col-11">{{$cupon->titulo}}</h3> <!--Titulo oferta-->
						<h3 class="col-1">{{$cupon->idcupon}}</h3> <!--Codigo oferta-->
					</div>
					<p><br>{{$cupon->descripcion}}</p><div class="row px-3 py-3"> <!--Descripcion oferta-->
					<p class="col-6">Fecha Compra: {{$cupon->fecha_compra}}</p>
					<p class="col-6">Fecha Caducidad: {{$cupon->fecha_caducidad}}</p>
                </div>
            </div>
            </div>
        </div>
        @endforeach
        <!-- Sesión de Cupones Canjeados -->
        <div class="card" style="width: 100%; background-color: #EBA753">
			<div class="card-body">
                <h5>Cupones canjeados</h5>
			</div>
        </div>
        @if(count($cliente->cuponesCanjeados($cliente->idcliente))==0)
            <div class="container p-5" >
				<center><?= "No posee cupones canjeados que mostrar" ?></center>
			</div>
        @endif
        @foreach ($cliente->cuponesCanjeados($cliente->idcliente) as $cupon)
        <div class="container p-4 gx-5">
			<div class="row p-4 ">
                <div class="col-7 p-4">
                    <div class="row">
                        <h3 class="col-11">{{$cupon->titulo}}</h3> <!--Titulo oferta-->
						<h3 class="col-1">{{$cupon->idcupon}}</h3> <!--Codigo oferta-->
					</div>
					<p><br>{{$cupon->descripcion}}</p><div class="row px-3 py-3"> <!--Descripcion oferta-->
					<p class="col-6">Fecha Compra: {{$cupon->fecha_compra}}</p>
					<p class="col-6">Fecha Caducidad: {{$cupon->fecha_caducidad}}</p>
                </div>
            </div>
        </div>
        </div>
        @endforeach
        <!-- Sesión de Cupones Vencidos -->
        <div class="card" style="width: 100%; background-color: #EBA753">
			<div class="card-body">
                <h5>Cupones Vencidos</h5>
			</div>
        </div>
        @if(count($cliente->cuponesVencidos($cliente->idcliente))==0)
            <div class="container p-5" >
				<center><?= "No posee cupones vencidos que mostrar" ?></center>
			</div>
        @endif
        @foreach ($cliente->cuponesVencidos($cliente->idcliente) as $cupon)
        <div class="container p-4 gx-5">
			<div class="row p-4 ">
                <div class="col-7 p-4">
                    <div class="row">
                        <h3 class="col-11">{{$cupon->titulo}}</h3> <!--Titulo oferta-->
						<h3 class="col-1">{{$cupon->idcupon}}</h3> <!--Codigo oferta-->
					</div>
					<p><br>{{$cupon->descripcion}}</p><div class="row px-3 py-3"> <!--Descripcion oferta-->
					<p class="col-6">Fecha Compra: {{$cupon->fecha_compra}}</p>
					<p class="col-6">Fecha Caducidad: {{$cupon->fecha_caducidad}}</p>
                </div>
            </div>
        </div>
        @endforeach

    </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        </div>
    </div>
    </div>
    </div>
    @endforeach

@endsection