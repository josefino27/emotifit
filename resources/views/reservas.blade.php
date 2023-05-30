@extends ('layouts.app') 

@section('content')
<h5>Bienvenido al sistema de reservas Emotiift</h5>

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

@endsection

