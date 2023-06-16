@extends('layouts.app')
@section('content')
<div class="card mt-3">
    <div class="card-header d-inline-flex">
        <h5>Agregar Reserva</h5>
        <a href="{{ route('reservas.index') }}" class="btn btn-primary ms-auto">
            <i class="fas fa-arrow-left"></i>
            Volver
        </a>
    </div>
    <div class="card-body">
        <form action="{{ route('reservas.store') }}" method="POST" enctype="multipart/form-data" id="crear">
            @include('reservas.form.form')
        </form>
    </div>
    <div class="card-fooder">
        <button class="btn btn-primary" form="crear">
            <i class="fas fa-plus"></i> Reservar
        </button>
    </div>
</div>
@endsection