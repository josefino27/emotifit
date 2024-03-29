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
            <form enctype="multipart/form-data">
                @include('rutinas-ejercicios.form.form')
            </form>
        </div>
    </div>
@endsection
