<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
    
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="{{asset('css/login/style.css')}}">
	
	<link rel="stylesheet" href="">  <title>@yield('title')</title>
    <script src="{{asset('js/login/jquery.min.js')}}"></script>
 	 <script src="{{asset('js/login/popper.js')}}"></script>
 	 <script src="{{asset('js/login/bootstrap.min.js')}}"></script>
 	 <script src="{{asset('js/login/main.js')}}"></script>
</head>
<body>
    
   

    <!-- Cuerpo de la página -->


    <div class="container mt-5">
        
        <div class="row">
            @yield('content')
        </div>
    </div>
</body>
</html>