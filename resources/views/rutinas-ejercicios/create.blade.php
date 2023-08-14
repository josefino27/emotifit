@extends('layouts.app')

@section('content')

<div class="card mt-3">
    <div class="card-header d-inline-flex">
        <h5>Agregar Ejercicio</h5>
        <a href="{{route('rutinasEjercicios.index')}}" class="btn btn-primary ms-auto">
            <i class="fas fa-arrow-left"></i>
            Volver
        </a>
    </div>

    <div class="card-body">
        <form action="{{route('rutinasEjercicios.store')}}" method="POST" enctype="multipart/form-data" id="crear">
        @include('rutinas-ejercicios.form.form')
        </form>
    </div>
    <div class="card-footer">
        <button class="btn btn-primary" form="crear">
        <i class="fas fa-plus"></i> Agregar
        </button>
    </div>
</div>

@endsection