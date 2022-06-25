@extends('layouts.app')

@section('content')
    <div class="card mt-3">
        <div class="card-header d-inline-flex">
            <h5>Agregar Clase</h5>
            <a href="{{ route('clases.index') }}" class="btn btn-primary ms-auto">
                <i class="fas fa-arrow-left"></i>
                Volver
            </a>
        </div>

        <div class="card-body">
            <form action="{{ route('clases.update', $clase->id_clase) }}" method="POST" enctype="multipart/form-data"
                id="crear">
                @method('put')
                @include('clases.form.form')
            </form>
        </div>
        <div class="card-footer">
            <button class="btn btn-primary" form="crear">
                <i class="fas fa-edit"></i> Editar
            </button>
        </div>
    </div>
@endsection
