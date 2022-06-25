@extends('layouts.app')

@section('content')
    <div class="card mt-3">
            <div class="card-header d-inline-flex">
                <h5>Musculos Emotifit</h5>
                <a href="{{ route('musculos.create') }}" class="btn btn-primary ms-auto ">
                    <i class="fas fa-plus"></i>
                    Agregar</a>
            </div>
    </div>
    @livewire('admin.musculos')
@endsection
