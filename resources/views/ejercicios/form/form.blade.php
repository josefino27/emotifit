@csrf
<div class="row">
    <div class="col-12">
        <div class="form-group">
            <label for="">Nombre Ejercicio</label>
            <input type="text" class="form-control" name="nombre-ejercicio" value="{{(isset($clase))?$clase->nombreClase:old('nombreClase')}}" required>
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label for="">Descripcion</label>
            <textarea class="form-control" name="descripcion-ejercicio" value="{{(isset($clase))?$clase->cupo:old('cupo')}}" required></textarea>
        </div>
    </div>
    {{-- <div class="col-12">
        <div class="form-group">
            <label for="">Categoria</label>
            <input type="text" class="form-control" name="categoria-ejercicio" value="{{(isset($clase))?$clase->horario:old('horario')}}" required>
        </div>
    </div> --}}
    <div class="col-12">
        <div class="form-group">
            <label for="">Imagen</label>
            <input type="file" class="form-control" name="imagen-ejercicio" accept="image/*" required>
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label for="">Video</label>
            <input type="file" class="form-control" name="video-ejercicio" value="{{(isset($clase))?$clase->horario:old('horario')}}" required>
        </div>
    </div>
<div>
