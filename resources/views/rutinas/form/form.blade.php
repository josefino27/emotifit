@csrf
<div class="row">
    <div class="col">
        <label for="nombre_rutina" class="form-label">Nombre de Rutina</label>
        <input type="text" name="nombre_rutina" id="nombre_rutina" value="{{(isset($rutina))?$rutina->nombre_rutina:old('')}}" required>
    </div>
</div>
{{-- <div class="row">
    <div class="col-md-3">
        <label for="option" class="form-label">Ejercicio</label>
        <select id="ejercicioId">
            @foreach ($ejercicios as $ejercicio)
            <option id="option" name="option" value="{{$ejercicio->nombre_ejercicio}}">{{$ejercicio->nombre_ejercicio}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-3">
        <label for="repeticion" class="form-label">Repeticiones</label>
        <input type="number" id="repeticion" style="width:50px;">
    </div>
    <div class="col-md-3">
        <label for="" class="form-label">Series</label>
        <input type="number" id="serie" style="width:50px;">
    </div>
    <div class="col-md-3">
        <input  class="btn btn-primary ms-auto" type="button" id="añadir_ejercicio" onclick="add()" value="Agregar" />
    </div>
</div>
<script>
    function add(){
        // alert(optionId.value);
        // alert(repeticionId.value);
        // alert(serieId.value);
        descripcion_rutina.value += 'ejercicio: '+option.value+'\nrepeticiones: '+repeticion.value+ '\nseries: '+serie.value+'\n\n';
        var check = document.getElementById("check");
    }
    
</script> --}}
<div class="row">
    <div class="mb-3">
        <label for="" class="form-label">Descripcion de la rutina</label>
        {{-- <textarea class="form-control"  rows="3" required id="descripcion_rutina" name="descripcion_rutina" value="{{(isset($rutina))?$rutina->descripcion_rutina:old('')}}"></textarea> --}}
        <input class="form-control"  rows="3" required id="descripcion_rutina" name="descripcion_rutina" value="{{(isset($rutina))?$rutina->descripcion_rutina:old('')}}"/>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="form-group">
            <label for="dia_entreno[]"  >Seleccione dia de entrenamiento</label>
            <label id="label"></label>
            <ul class="list-group" id="check">
                <li class="list-group-item">
                    <input class="form-check-input me-1"  name="dia_entreno[]"  type="checkbox" value="lunes" aria-label="..." 
                    @if(isset($rutina->dia_entreno))
                    @if (in_array('lunes',$rutina->dia_entreno))
                    checked
                    @else
                    @endif
                    @else
                    @endif>
                    Lunes
                </li>
                <li class="list-group-item">
                    <input class="form-check-input me-1"  name="dia_entreno[]" type="checkbox" value="martes" aria-label="..."
                    @if(isset($rutina->dia_entreno))
                    @if (in_array('martes',$rutina->dia_entreno))
                    checked
                    @else
                    @endif
                    @else
                    @endif>
                    Martes
                </li>
                <li class="list-group-item">
                    <input class="form-check-input me-1" name="dia_entreno[]"  type="checkbox" value="miercoles" aria-label="..."
                    @if(isset($rutina->dia_entreno))
                    @if (in_array('miercoles',$rutina->dia_entreno))
                    checked
                    @else
                    @endif
                    @else
                    @endif>
                    Miercoles
                </li>
                <li class="list-group-item">
                    <input class="form-check-input me-1"  name="dia_entreno[]" type="checkbox" value="jueves" aria-label="..."
                    @if(isset($rutina->dia_entreno))
                    @if (in_array('jueves',$rutina->dia_entreno))
                    checked
                    @else
                    @endif
                    @else
                    @endif>
                    Jueves
                </li>
                <li class="list-group-item">
                    <input class="form-check-input me-1"  name="dia_entreno[]" type="checkbox" value="viernes" aria-label="..."
                    @if(isset($rutina->dia_entreno))
                    @if (in_array('viernes',$rutina->dia_entreno))
                    checked
                    @else
                    @endif
                    @else
                    @endif>
                    Viernes
                </li>
                <li class="list-group-item">
                    <input class="form-check-input me-1"  name="dia_entreno[]" type="checkbox" value="sabado" aria-label="..."
                    @if(isset($rutina->dia_entreno))
                    @if (in_array('sabado',$rutina->dia_entreno))
                    checked
                    @else
                    @endif
                    @else
                    @endif>
                    Sabado
                </li>
                <li class="list-group-item">
                    <input class="form-check-input me-1"  name="dia_entreno[]" type="checkbox" value="domingo" aria-label="..."
                    @if(isset($rutina->dia_entreno))
                    @if (in_array('domingo',$rutina->dia_entreno))
                    checked
                    @else
                    @endif
                    @else
                    @endif>
                    Domingo
                </li>
            </ul>
        </div>
    </div>
</div>