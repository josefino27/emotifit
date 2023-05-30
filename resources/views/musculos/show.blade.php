@extends('layouts.app')

@section('content')
<div class="card mt-3">
        <div class="card-header d-inline-flex">
            <h5>Ver Musculo</h5>
            <a href="{{ route('musculos.index') }}" class="btn btn-primary ms-auto">
                <i class="fas fa-arrow-left"></i>
                Volver
            </a>
        </div>

    <div class="card-body">

        @include('musculos.form.form')
       
    </div>

</div>

@endsection