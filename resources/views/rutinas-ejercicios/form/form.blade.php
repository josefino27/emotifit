@csrf
@if(isset($rutinas))
<div class="row">
    <div class="col-3">
        <label for="option" class="form-label">Rutina: </label>
        <select name="id_rutina" id="id_rutina">
            @if(request()->routeIs('rutinasEjercicios.create'))
            @foreach ($rutinas as $rutina)
            <option value="{{$rutina->id_rutina}}">{{$rutina->nombre_rutina}}</option>
            @endforeach
            @elseif(request()->routeIs('rutinasEjercicios.edit'))
            <option value="{{$rutinas->id_rutina}}">{{$rutinas->nombre_rutina}}</option> 
            @else
            <option value="{{$rutinas->id_rutina}}">{{$rutinas->nombre_rutina}}</option> 
            @endif
        </select>
    </div>
@endif
@if(isset($ejercicios))
    <div class="col-md-3">
        <label for="option" class="form-label">Ejercicio: </label>
        <select name="id_ejercicio">
            @if(isset($rutinaEjercicios))
            <option id="id_ejercicio" name="id_ejercicio" value="{{$rutinaEjercicios->id_ejercicio}}">{{$rutinaEjercicios->nombre_ejercicio}}</option>
            @endif
                @foreach ($ejercicios as $ejercicio)
                <option id="id_ejercicio" name="id_ejercicio" value="{{$ejercicio->id_ejercicio}}">{{$ejercicio->nombre_ejercicio}}</option>
                @endforeach
        </select>
    </div>
    @endif
    @if(isset($series))
    <div class="col-md-3">
        <label for="" class="form-label">Series</label>
        <select name="id_serie" id="id_serie">
            @if(isset($rutinaEjercicios))
            <option value="{{$rutinaEjercicios->serie_tipo}}" id="option">{{$rutinaEjercicios->tipo}}</option>
            @endif
            @if(request()->routeIs('rutinasEjercicios.create'))
            @foreach($series as $serie)
            <option value="{{$serie->id_serie}}" id="option">{{$serie->tipo}}</option>
            @endforeach
            @elseif(request()->routeIs('rutinasEjercicios.edit'))
            <option value="{{$series->id_serie}}" id="option">{{$series->tipo}}</option>
            @else
            <option value="{{$series->id_serie}}" id="option">{{$series->tipo}}</option>
            @endif
        </select>
    </div>
    @endif
    @if(isset($rutinaEjercicios))
    <div class="col-md-3">
        <label for="repeticion" class="form-label" id="repeticion">{{isset($rutinaEjercicios->repeticiones)?"Repeticiones":"Segundos";}}</label>
        <input type="number" id="tipo" name="repeticiones" style="width:50px;" value="{{isset($rutinaEjercicios->repeticiones)?$rutinaEjercicios->repeticiones:$rutinaEjercicios->duracion_segundos}}" />
    </div>
    @else
    <div class="col-md-3">
        <label for="repeticion" class="form-label" id="repeticion">Repeticiones</label>
        <input type="number" id="tipo" name="repeticiones" style="width:50px;">
    </div>
</div>
@endif


<script>
    var option = document.getElementById("id_serie");
    var label = document.getElementById("repeticion");
    var tipo = document.getElementById("tipo");
    option.addEventListener('change',function(event){
        if(option.value=='1'){
            
            console.log(option.value);
            console.log(label.innerHTML = "Repeticiones");
            console.log(tipo.name = "repeticiones");
        }
        if(option.value=='2'){

            console.log(option.value);
            console.log(label.innerHTML = "Segundos");
            console.log(tipo.name = "duracion_segundos");
        }
        
    });
</script>
