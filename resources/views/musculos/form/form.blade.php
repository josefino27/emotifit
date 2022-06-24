@csrf
<div class="row">
    <div class="col-12">
        <div class="form-group">
            <label for="">Nombre</label>
            <input type="text" class="form-control" name="nombre"
            value="{{(isset($musculo))?$musculo->nombre:old('nombre')}}" required>
        </div>

    </div>

<div>
