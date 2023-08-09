@extends('layouts.app')

@section('content')
<div class="card mt-3">

    @can('users')
    
    <div class="card-header d-inline-flex">
        <h5>Ejercicios Emotifit</h5>
     
        <a href="{{route('emocion.create')}}" class="btn btn-primary ms-auto ">
            <i class="fas fa-plus"></i>
            Agregar</a>
    </div>

    @endcan

    @livewire('admin.emocion')

</div>

@endsection