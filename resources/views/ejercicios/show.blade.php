@extends('layouts.app')

@section('content')
<div class="card mt-3">
    <div class="card-header d-inline-flex">
        <h5>Ejercicio: {{$ejercicio->nombre_ejercicio}}</h5>
        <a href="{{route('ejercicios.index')}}" class="btn btn-primary ms-auto">
            <i class="fas fa-arrow-left"></i>
            Volver
        </a>
    </div>

    <div class="card-body">

        @include('ejercicios.form.form')
       
    </div>

    <div class="card mt-3">
        <div class="card-header d-inline-flex">
            @foreach ($ejercicio as $ejercice)

            <img src="" alt="">
                
            @endforeach
        </div>
    </div>

</div>

@endsection