@extends('layouts.app')

@section('content')
@can('users')
<div class="card mt-3">
    <div class="card-header d-inline-flex">
        <h5>Reservas Emotifit</h5>
        <a href="{{route('reservas.create')}}" class="btn btn-primary ms-auto ">
            <i class="fas fa-plus"></i>
            Agregar</a>
    </div>
</div>
@endcan

@livewire('admin.reservas')

@endsection