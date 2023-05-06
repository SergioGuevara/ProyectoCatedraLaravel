<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Lista de rubros</h3>
    @if($rubros)
    <table>
        <tr>
            <th>ID Rubro</th>
            <th>Rubro</th>
        </tr>
        @foreach ($rubros as $rubro)
        <tr>
            <td>{{$rubro->idrubro}}</td>
            <td>{{$rubro->Rubro}}</td>
            
        </tr>
        @endforeach
    </table>    
    @endif
</body>
</html>