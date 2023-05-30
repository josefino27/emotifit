@extends('layouts.app')

@section('content')
<div class="card mt-3">
    <div class="card-header d-inline-flex">
        <h5>Agregar Ejercicio</h5>
        <a href="{{route('ejercicios.index')}}" class="btn btn-primary ms-auto">
            <i class="fas fa-arrow-left"></i>
            Volver
        </a>
    </div>

    <div class="card-body">
        <form action="{{route('ejercicios.update',$ejercicio->id_ejercicio)}}" method="POST" enctype="multipart/form-data" id="crear">
        @method('put')
        @include('ejercicios.form.form')
        </form>
    </div>
    <div class="card-footer">
        <button class="btn btn-primary" form="crear">
        <i class="fas fa-edit"></i> Editar
        </button>
    </div>                                                          
</div>

@endsection