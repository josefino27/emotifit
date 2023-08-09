@extends('layouts.app')

@section('content')

<div class="card mt-3">
    <div class="card-header d-inline-flex">
        <h5>Rutinas Ejercicios Emotifit</h5>
        @can('rutinas-ejercicios.create')
        <a href="{{route('rutinasEjercicios.create')}}" class="btn btn-primary ms-auto">
        <i class="fas fa-plus"></i>   
        Agregar</a>
        @endcan

    </div>
    @livewire('admin.rutinas-ejercicios')
</div>@endsection