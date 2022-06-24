@extends('layouts.app')

@section('content')
    <div class="card mt-3">
        <div class="card-header d-inline-flex">
            <h5>Editar Nombre del Musculo</h5>
            <a href="{{ route('musculos.index') }}" class="btn btn-primary ms-auto">
                <i class="fas fa-arrow-left"></i>
                Volver
            </a>
        </div>

        <div class="card-body">
            <form action="{{ route('musculos.update', $musculo->id) }}" method="POST" id="crear">
                @method('put')
                @include('musculos.form.form')
            </form>
            <div class="card-footer">
                <button class="btn btn-primary" form="crear">
                    <i class="fas fa-edit"></i> Editar
                </button>
            </div>
        </div>
    </div>
@endsection
