@extends('Core/Menu2');
@section('content')

    <!-- Cuerpo de la página -->

	<div class="container py-5">
        <div class="container py-3">
            <h4>Agregar promocion:</h4>
            <br>
            <!-- Button trigger modal -->
            <a type="button" class="btn btn-success" href="{{ route('createOfertas')}}">
            Agregar una promocion
            </a>
            
        </div>
    </div>

    <div class="container">
        <hr>
    </div>

    <!-- OFERTAS ACTIVAS idestado=3-->
	<div class="container p-4 gx-5">
        <div class="container-fluid">
            <h1 class="text-center border-top border-bottom bg-success py-3 text-white">Ofertas activas</h1>
        </div>
	@if($ofertas)
		@foreach ($ofertas as $oferta)
			@if(($oferta->idestado)==3)
	<div class="container">
        <hr>
    </div>
		<div class="row p-4 ">
            <div class="col-5 justify-content-center">
                <div class="container">
                <img src="{{ asset("img/$oferta->imagen") }}" alt="..." class="img-fluid float-right">
                </div>    
            </div>
			<div class="col-7 p-4">
            
				<h3>{{$oferta->titulo}}</h3>
				<p class="py-3">{{$oferta->descripcion}}</p>
				<p hidden>{{$oferta->idempresa}}</p>
				<p hidden>{{$oferta->idoferta}}</p>
				<p hidden>{{$oferta->idestado}}</p>
				<p hidden></p>
				<div class="row px-3 py-3">
					<p class="col-4"><b>Precio Regular:</b> ${{$oferta->precio_regular}}</p>
					<p class="col-4"><b>Precio con Cupón:</b> ${{$oferta->precio_oferta}}</p>
					<p class="col-4"><b>Precio de compra:</b> ${{$oferta->precio_de_compra}}</p>
				</div>
				<div class="row px-3 py-3">
					<p class="col-4"><b>Fecha de inicio:</b> {{$oferta->fecha_inicio->format('m/d/y')}}</p>
					<p class="col-4"><b>Vence:</b> {{$oferta->fecha_final->format('m/d/y')}}</p>
					<p class="col-4"><b>Precio de compra:</b> ${{$oferta->precio_de_compra}}</p>
				</div>
				<div class="row p-3 px-3">
                    <p class="col-3"><b>disponibles:</b> {{$oferta->cantidad_cupones}}</p>
					<p class="col-3"><b>vendidos:</b> {{$oferta->cuponesVendidosPorOferta($oferta->idoferta)}}</p>
                    <p class="col-3"><b>ingresos totales:</b> ${{$oferta->calcularIngresosPorOferta($oferta->idoferta)}}</p>
					<p class="col-3"><b>cargo por servicio:</b> ${{$oferta->calcularRevenuePorOferta($oferta->idoferta)}}			
				</div>
			</div>
		</div>	
			@endif	
		@endforeach
	@endif
           
	</div>

<!-- APROBADOS idestado=1-->
<div class="container p-4 gx-5">
        <div class="container-fluid">
            <h1 class="text-center border-top border-bottom bg-warning py-3 text-white">Ofertas aprobadas</h1>
        </div>
	@if($ofertas)
		@foreach ($ofertas as $oferta)
			@if(($oferta->idestado)==1)
	<div class="container">
        <hr>
    </div>
		<div class="row p-4 ">
            <div class="col-5 justify-content-center">
                <div class="container">
                <img src="{{ asset("img/$oferta->imagen") }}" alt="..." class="img-fluid float-right">
                </div>    
            </div>
			<div class="col-7 p-4">
            
				<h3>{{$oferta->titulo}}</h3>
				<p class="py-3">{{$oferta->descripcion}}</p>
				<p hidden>{{$oferta->idempresa}}</p>
				<p hidden>{{$oferta->idoferta}}</p>
				<p hidden>{{$oferta->idestado}}</p>
				<p hidden></p>
				<div class="row px-3 py-3">
					<p class="col-4"><b>Precio Regular:</b> ${{$oferta->precio_regular}}</p>
					<p class="col-4"><b>Precio con Cupón:</b> ${{$oferta->precio_oferta}}</p>
					<p class="col-4"><b>Precio de compra:</b> ${{$oferta->precio_de_compra}}</p>
				</div>
				<div class="row px-3 py-3">
					<p class="col-4"><b>Fecha de inicio:</b> {{$oferta->fecha_inicio->format('m/d/y')}}</p>
					<p class="col-4"><b>Vence:</b> {{$oferta->fecha_final->format('m/d/y')}}</p>
                    <p class="col-4"><b>disponibles:</b> {{$oferta->cantidad_cupones}}</p>
				</div>

			</div>
		</div>	
			@endif	
		@endforeach
	@endif
           
	</div>

<!-- en espera de aprob idestado=4-->
<div class="container p-4 gx-5">
        <div class="container-fluid">
            <h1 class="text-center border-top border-bottom bg-warning py-3 text-white">Ofertas en espera de aprobacion</h1>
        </div>
	@if($ofertas)
		@foreach ($ofertas as $oferta)
			@if(($oferta->idestado)==4)
	<div class="container">
        <hr>
    </div>
		<div class="row p-4 ">
            <div class="col-5 justify-content-center">
                <div class="container">
                <img src="{{ asset("img/$oferta->imagen") }}" alt="..." class="img-fluid float-right">
                </div>    
            </div>
			<div class="col-7 p-4">
            
				<h3>{{$oferta->titulo}}</h3>
				<p class="py-3">{{$oferta->descripcion}}</p>
				<p hidden>{{$oferta->idempresa}}</p>
				<p hidden>{{$oferta->idoferta}}</p>
				<p hidden>{{$oferta->idestado}}</p>
				<p hidden></p>
				<div class="row px-3 py-3">
					<p class="col-4"><b>Precio Regular:</b> ${{$oferta->precio_regular}}</p>
					<p class="col-4"><b>Precio con Cupón:</b> ${{$oferta->precio_oferta}}</p>
					<p class="col-4"><b>Precio de compra:</b> ${{$oferta->precio_de_compra}}</p>
				</div>
				<div class="row px-3 py-3">
					<p class="col-4"><b>Fecha de inicio:</b> {{$oferta->fecha_inicio->format('m/d/y')}}</p>
					<p class="col-4"><b>Vence:</b> {{$oferta->fecha_final->format('m/d/y')}}</p>
                    <p class="col-4"><b>disponibles:</b> {{$oferta->cantidad_cupones}}</p>
				</div>

			</div>
		</div>	
			@endif	
		@endforeach
	@endif
           
	</div>
    <!--Reprobadas idestado==2-->
    <div class="container p-4 gx-5">
        <div class="container-fluid">
            <h1 class="text-center border-top border-bottom bg-danger py-3 text-white">Ofertas rechazadas</h1>
        </div>
	@if($ofertas)
		@foreach ($ofertas as $oferta)
			@if(($oferta->idestado)==2)
	<div class="container">
        <hr>
    </div>
		<div class="row p-4 ">
            <div class="col-5 justify-content-center">
                <div class="container">
                <img src="{{ asset("img/$oferta->imagen") }}" alt="..." class="img-fluid float-right">
                </div>    
            </div>
			<div class="col-7 p-4">
            
				<h3>{{$oferta->titulo}}</h3>
				<p class="py-3">{{$oferta->descripcion}}</p>
				<p hidden>{{$oferta->idempresa}}</p>
				<p hidden>{{$oferta->idoferta}}</p>
				<p hidden>{{$oferta->idestado}}</p>
				<p hidden></p>
				<div class="row px-3 py-3">
					<p class="col-4"><b>Precio Regular:</b> ${{$oferta->precio_regular}}</p>
					<p class="col-4"><b>Precio con Cupón:</b> ${{$oferta->precio_oferta}}</p>
					<p class="col-4"><b>Precio de compra:</b> ${{$oferta->precio_de_compra}}</p>
				</div>
				<div class="row px-3 py-3">
					<p class="col-4"><b>Fecha de inicio:</b> {{$oferta->fecha_inicio->format('m/d/y')}}</p>
					<p class="col-4"><b>Vence:</b> {{$oferta->fecha_final->format('m/d/y')}}</p>
                    <p class="col-4"><b>disponibles:</b> {{$oferta->cantidad_cupones}}</p>
				</div>

			</div>
		</div>	
			@endif	
		@endforeach
	@endif
           
	</div>
    <!--PASADAS idestado=5-->
    <div class="container p-4 gx-5">
        <div class="container-fluid">
            <h1 class="text-center border-top border-bottom bg-danger py-3 text-white">Oferta caducadas</h1>
        </div>
	@if($ofertas)
		@foreach ($ofertas as $oferta)
			@if(($oferta->idestado)==5)
	<div class="container">
        <hr>
    </div>
		<div class="row p-4 ">
            <div class="col-5 justify-content-center">
                <div class="container">
                <img src="{{ asset("img/$oferta->imagen") }}" alt="..." class="img-fluid float-right">
                </div>    
            </div>
			<div class="col-7 p-4">
            
				<h3>{{$oferta->titulo}}</h3>
				<p class="py-3">{{$oferta->descripcion}}</p>
				<p hidden>{{$oferta->idempresa}}</p>
				<p hidden>{{$oferta->idoferta}}</p>
				<p hidden>{{$oferta->idestado}}</p>
				<p hidden></p>
				<div class="row px-3 py-3">
					<p class="col-4"><b>Precio Regular:</b> ${{$oferta->precio_regular}}</p>
					<p class="col-4"><b>Precio con Cupón:</b> ${{$oferta->precio_oferta}}</p>
					<p class="col-4"><b>Precio de compra:</b> ${{$oferta->precio_de_compra}}</p>
				</div>
				<div class="row px-3 py-3">
					<p class="col-4"><b>Fecha de inicio:</b> {{$oferta->fecha_inicio->format('m/d/y')}}</p>
					<p class="col-4"><b>Vence:</b> {{$oferta->fecha_final->format('m/d/y')}}</p>
                    <p class="col-4"><b>disponibles:</b> {{$oferta->cantidad_cupones}}</p>
				</div>

			</div>
		</div>	
			@endif	
		@endforeach
	@endif
           
	</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
@endsection