@extends('layouts.app')

@section('content')

<div class="card mt-3">
    <div class="card-header d-inline-flex">
        <h5>Agregar Rutina</h5>
        <a href="{{route('rutinas.index')}}" class="btn btn-primary ms-auto">
            <i class="fas fa-arrow-left"></i>
            Volver
        </a>
    </div>

    <div class="card-body">
        <form action="{{route('rutinas.store')}}" method="POST" enctype="multipart/form-data" id="crear" onsubmit="return validarDiaEntreno();">
        @include('rutinas.form.form')
        </form>
    </div>
    <div class="card-footer">
        <button class="btn btn-primary" form="crear" onclick="validarDiaEntreno()">
        <i class="fas fa-plus"></i> Crear y añadir ejercicios
        </button>
    </div>
</div>
<script>
    function validarDiaEntreno(){
    const checkboxes = document.querySelectorAll('input[name="dia_entreno[]"]');
    let alMenosUnDiaSeleccionado = false;

    checkboxes.forEach(checkbox => {
        if (checkbox.checked) {
            alMenosUnDiaSeleccionado = true;
        }
    });

    if (!alMenosUnDiaSeleccionado) {

        var label = document.getElementById('label');
        label.textContent =" (Seleccione por lo menos un dia de entrenamiento.) ";
        label.style.color='red';
        return false; // Evitar que se envíe el formulario
    }

    // El formulario se enviará si al menos un día está seleccionado
    return true;
    }
</script>
@endsection