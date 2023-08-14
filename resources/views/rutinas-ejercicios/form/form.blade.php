@csrf
@if(isset($rutinas))
<div class="row">
    <div class="col-3">
        <label for="option" class="form-label">Rutina: </label>
        <select name="id_rutina" id="id_rutina">
            @foreach ($rutinas as $rutina)
            <option value="{{$rutina->id_rutina}}">{{$rutina->nombre_rutina}}</option>
            @endforeach
        </select>
    </div>
@endif
@if(isset($ejercicios))
    <div class="col-md-3">
        <label for="option" class="form-label">Ejercicio: </label>
        <select name="id_ejercicio">
            @foreach ($ejercicios as $ejercicio)
            <option id="id_ejercicio" name="id_ejercicio" value="{{$ejercicio->id_ejercicio}}">{{$ejercicio->nombre_ejercicio}}</option>
            @endforeach
        </select>
    </div>
    @if($series)
    <div class="col-md-3">
        <label for="" class="form-label">Series</label>
        <select name="id_serie" id="id_serie">
        @foreach($series as $serie)
            <option value="{{$serie->id_serie}}" id="option">{{$serie->tipo}}</option>
        @endforeach
        </select>
    </div>
    <div class="col-md-3">
        <label for="repeticion" class="form-label" id="repeticion">Repeticiones</label>
        <input type="number" id="tipo" name="repeticiones" style="width:50px;">
    </div>
    @endif
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
