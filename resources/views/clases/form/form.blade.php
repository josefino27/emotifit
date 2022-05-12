@csrf
<div class="row">
    <div class="col-12">
        <div class="form-group">
            <label for="">Nombre de la Clase</label>
            <input type="text" class="form-control" name="nombreClase" value="{{(isset($clase))?$clase->nombreClase:old('nombreClase')}}" required>
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label for="">cupos Disponibles</label>
            <input type="text" class="form-control" name="cupo" value="{{(isset($clase))?$clase->cupo:old('cupo')}}" required>
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label for="">Horario</label>
            <input type="text" class="form-control" name="horario" value="{{(isset($clase))?$clase->horario:old('horario')}}" required>
        </div>
    </div>
<div>
