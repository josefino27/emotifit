<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $titulo }}</title>
</head>
<body>
aqui va el formulario para reservar.
necesitamos 
nombre
correo
telefono
fecha
horario
</br>
<a href="{{ route('ruta.reserve.create')}}">crear reserva</a>
<a href="{{ route('ruta.reserve.show')}}">mostrar reserva</a>
<a href="{{ route('ruta.reserve.edit')}}">editar reserva</a>
<a href="{{ route('ruta.reserve.delete')}}">eliminar reserva</a>


</body>
</html>