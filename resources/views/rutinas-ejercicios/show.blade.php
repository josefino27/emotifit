@extends('layouts.app')

@section('content')
    <div class="card mt-3">
        <div class="card-header d-inline-flex">
            <h5>Ver Rutina Ejercicio</h5>
            <a href="{{ route('rutinasEjercicios.index') }}" class="btn btn-primary ms-auto">
                <i class="fas fa-arrow-left"></i>
                Volver
            </a>
        </div>
        <div class="card-body">
            <form action="{{ route('rutinasEjercicios.update', $rutinaEjercicio->id_rutina_ejercicio) }}" method="POST" enctype="multipart/form-data"
                id="crear">
                @method('put')
                @include('rutinas-ejercicios.form.form')
            </form>
        </div>
    </div>
@endsection
