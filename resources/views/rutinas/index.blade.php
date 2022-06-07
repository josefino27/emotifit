@extends('layouts.app')

@section('content')

<div class="card mt-3">
    <div class="card-header d-inline-flex">
        <h5>Rutinas Emotifit</h5>
        
        <a href="{{route('rutinas.create')}}" class="btn btn-primary ms-auto">
        <i class="fas fa-plus"></i>   
        Agregar</a>
    </div>
</div>@endsection