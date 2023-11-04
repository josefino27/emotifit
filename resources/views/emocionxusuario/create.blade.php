@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Emocionxusuario
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header d-inline-flex">
                        <span class="card-title">{{ __('Crear') }} Emocionxusuario</span>
                        <a href="{{route('emocionxusuarios.index')}}" class="btn btn-primary ms-auto">
                            <i class="fas fa-arrow-left"></i>
                            Volver
                        </a>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('emocionxusuarios.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('emocionxusuario.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
