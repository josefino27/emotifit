@extends('layouts.app')

@section('content')
<div class="card mt-3">
    <div class="card-header d-inline-flex">
        <h5>Emocion: {{$emocion->nombre_emocion}}</h5>
        <a href="{{route('emocion.index')}}" class="btn btn-primary ms-auto">
            <i class="fas fa-arrow-left"></i>
            Volver
        </a>
    </div>

    <div class="card-body">

        @include('emociones.form.form')
       
    </div>


</div>

@endsection