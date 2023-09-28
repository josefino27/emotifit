@extends('layouts.app')

@section('template_title')
    {{ $emocionxusuario->name ?? "{{ __('Show') Emocionxusuario" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Emocionxusuario</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('emocionxusuarios.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id Emocionxusuario:</strong>
                            {{ $emocionxusuario->id_emocionxusuario }}
                        </div>
                        <div class="form-group">
                            <strong>Id Emocion:</strong>
                            {{ $emocionxusuario->id_emocion }}
                        </div>
                        <div class="form-group">
                            <strong>Id Usuario:</strong>
                            {{ $emocionxusuario->id_usuario }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
