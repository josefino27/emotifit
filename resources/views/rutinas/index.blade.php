@extends('layouts.app')

@section('content')

<div class="card mt-3">
    <div class="card-header d-inline-flex">
        <h5>Rutinas Emotifit</h5>
        @can('rutinas.create')
        <a href="{{route('rutinas.create')}}" class="btn btn-primary ms-auto">
        <i class="fas fa-plus"></i>   
        Agregar</a>
        @endcan

    </div>
    @livewire('admin.rutinas')
</div>@endsection