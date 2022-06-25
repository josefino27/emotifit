@extends('layouts.app')

@section('content')
<div class="card mt-3">
    <div class="card-header d-inline-flex">
        <h5>Clase Id: {{$clase->id_clase}}</h5>
        <a href="{{route('clases.index')}}" class="btn btn-primary ms-auto">
            <i class="fas fa-arrow-left"></i>
            Volver
        </a>
    </div>

    <div class="card-body">

        @include('clases.form.form')
       
    </div>
</div>

@endsection