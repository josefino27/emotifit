@extends('layouts.app')

@section('content')

<div class="card mt-3">
    <div class="card-header d-inline-flex">
        <h5>Nutricion Emotifit</h5>
    </div>

</div>

<div class="card mt-3">
    <a data-bs-toggle="collapse" href="#page" role="button" aria-expanded="false" aria-controls="collapseExample">
        <h5>Consulta tu IMC (Indice de Masa Corporal)</h5>
    </a>
    <div class="card-header d-inline-flex">
        <div class="card card-body">
            <ul class="collapse list-unstyled" id="page">

                <form method="POST" action="{{route('nutricion.store')}}">
                    @csrf
                    <div class="form-floating mb-3">
                        <input name="altura" type="number" class="form-control" id="floatingInput" required>

                        <label for="floatingInput">Altura en centimetros</label>
                    </div>
                    <div class="form-floating">
                        <input name="peso" type="number" class="form-control" id="floatingPassword" required>

                        <label for="floatingPassword">Peso en kilogramos</label>
                    </div>
                    <button class="btn btn-primary">enviar</button>
                </form>

            </ul>
            <h5> @isset($imc)Su indice de masa corporal esta en: {{ $m }}@else @endisset</h5>
        </div>

    </div>


</div>

@endsection