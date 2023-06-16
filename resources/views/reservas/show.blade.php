@extends('layouts.app')

@section('content')
<div class="card mt-3">
    <div class="card-header d-inline-flex">
        <div class="container">        
            <h5>User: {{$reserva->name}}</h5>
        </div>
        <div class="container"> 
            <h5>Clase: {{$reserva->nombreClase}}</h5>
        </div>
        <a href="{{route('reservas.index')}}" class="btn btn-primary ms-auto" title="Volver Atras">
            <i class="fas fa-arrow-left"></i>
        </a>
    </div>
    <form action="{{route('reservas.store')}}" method="POST" enctype="multipart/form-data" id="crear">
    <div class="card-body">
        @include('reservas.form.form')
    </div>
    </form>
</div>

</div>
@endsection