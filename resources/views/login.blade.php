@extends('layout.logintemplate')
@section('title','Login')
@section('content')

		<div class="container mt-4">
			<div class="row justify-content-center mt-4">
				<div class="col-md-12 col-lg-10 mt-4">
					<div class="wrap d-md-flex">
						<div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last">
							<div class="text w-100">
								<h2>La Cuponera</h2>
								<p>¿Aun no tienes una cuenta?</p>
								<a href="" class="btn btn-white btn-outline-white">Registrarse</a>
							</div>
						</div>
					<div class="login-wrap p-4 p-lg-5">
			      	<div class="d-flex">
			      		<div class="w-100">
							<center><h3 class="mb-4">Inicio de Sesión</h3></center>
			      		</div>
								
			      	</div>
						<form method="post" action="{{route('login.check')}}"  >
			      		@csrf
                        <div class="form-group mb-3">
			      			<label class="label" for="name">Correo</label>
			      			<input type="text" class="form-control" placeholder="Correo" id="idadmin" name="idadmin">
			      		</div>
		            <div class="form-group mb-3">
		            	<label class="label" for="password">Contraseña</label>
		              <input type="password" class="form-control" placeholder="Contraseña" id="pass" name="pass">
		            </div>
					@error('idadmin')
                    <div class="alert alert-danger">Correo y/o contraseña son incorrectos</div>
                    @enderror
					@error('pass')
                    <div class="alert alert-danger">Correo y/o contraseña son incorrectos</div>
                    @enderror
					@if (session('message'))
						<div class="alert alert-danger">{{ session('message') }}</div>
					@endif	            
					<div class="form-group ">
		            	<button type="submit" name="enviar" class="form-control btn btn-primary submit px-3">Iniciar Sesión</button>
		            </div>
		            
		          </form>
		        </div>
		      </div>
				</div>
			</div>
		</div>

    @endsection