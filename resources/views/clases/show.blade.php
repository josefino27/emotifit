@extends('layouts.app')

@section('content')
<div class="card mt-3">
    <div class="card-header d-inline-flex">
        <h5>Clase Id: {{$clase->id_clase}}</h5>
        <a href="{{route('clases.index')}}" class="btn btn-primary ms-auto">
            <i class="fas fa-arrow-left"></i>
            Volver
        </a>
    </div>

    <div class="card-body">

        @include('clases.form.form')
       
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-6">
            <img src="{{asset('storage').'/'.$clase->imagen}}" width="200">
                </div>
                <div class="col-6">
                    <h5>Descripcion</h5>
                    <div class="form-group">
                        <span>
                            <input type="file" class="form-control" name="imagen" accept="image/*" value="{{isset($clase)?$clase->imagen:old('imagen')}}" required>
                           <span width="200">{{asset('storage').'/'.$clase->imagen}}</span>
                        </span>
                    </div>

                </div>
            </div>
        </div>
</div>

@endsection