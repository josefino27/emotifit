@extends('layouts.app')

@section('content')
    <div class="card mt-3">

        @can('users')
            <div class="card-header d-inline-flex">
                <h5>Emociones de usuario</h5>

                <a href="{{ route('emocionxusuarios.create') }}" class="btn btn-primary ms-auto ">
                    <i class="fas fa-plus"></i>
                    Agregar</a>
            </div>
        @endcan

        @livewire('admin.emocionxusuario')

    </div>
@endsection
