@csrf
@if(isset($reserva))
<div class="row">
    <div class="col-12">
        <h3> Reserva #{{$reserva->id_reserva}}</h3>
    </div>
</div>
@else
@endif
<div class="row">
    <div class="col-6">
        <div class="form-group">
            <td>
                <label for="">Id User</label>
                <input 
                type="text" 
                name="id_usuario" 
                value="{{(isset($reserva))?$reserva->id_usuario:old('')}}" required> 
            </td>
        </div>
    </div>
    <div class="col-6">
        <td>
            <div class="form-group">
                <label for=""> Id clase</label>
                <input type="text" name="id_clase"  value="{{(isset($reserva))?$reserva->id_clase:old('')}}"  required>
            </div>
        </td>
    </div>
</div>
<br>
<div class="row">
    @if(isset($reserva))
    <div class="col-12">
        <div class="form-group">
            <td>
                <label for="">Fecha</label>
                <input type="date" class="form-control" name="fecha" value="{{(isset($reserva))?$reserva->fecha:old('fecha')}}" required>
            </td>
            <td>
                <label for="">Comienza</label>
                <input type="time" class="form-control" name="comienza" value="{{(isset($reserva))?$reserva->comienza:old('comienza')}}" required>
            </td>
            <td>
                <label for="">Termina</label>
                <input type="time" class="form-control" name="termina" value="{{(isset($reserva))?$reserva->termina:old('termina')}}" required>
            </td>
        </div>
    </div>
    @else
    @endif
</div>
<br>
<div class="row">
    <div class="col-12">
        <div class="form-group">
            @if(isset($reserva))
            <td>
                <label for="">imagen</label>

                <img src="{{ asset('storage').'/'.$reserva->imagen }}" width="200">
                <span>
                    <h3>Descripcion: </h3>
                    {{$reserva->descripcion}}
                </span>
            </td>
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label for="">cupos Disponibles</label>
            <input type="text" class="form-control" name="cupo" value="{{(isset($reserva))?$reserva->cupo:old('cupo')}}" required>
        </div>
    </div>
    @else
    @endif
</div>
