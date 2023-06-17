@csrf
<div class="row">
    <div class="col-12">
        <div class="form-group">
            <label for="">Nombre Ejercicio</label>
            <input type="text" class="form-control" name="nombre_ejercicio"
                value="{{ isset($ejercicio) ? $ejercicio->nombre_ejercicio : old('nombre_ejercicio') }}" required>
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label for="">Descripcion</label>
            <input type="text" class="form-control" name="descripcion"
                value="{{ isset($ejercicio) ? $ejercicio->descripcion : old('descripcion') }}" required>
        </div>
    </div>
    <div>
        <div>                                        
            <label for="">Categoria</label>
                <select class="col-12" name="id_musculo">
                    @if(isset($ejercicio->nombre))
                    <option  value="{{$ejercicio->id}}">{{$ejercicio->id}} - {{$ejercicio->nombre}} </option>
                    @else
                    @foreach ($musculo as $muscle)
                    <option  value="{{$muscle->id}}">{{$muscle->id}} - {{$muscle->nombre}} </option>
                    @endforeach
                    @endif
                   
                </select>
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label for="">Imagen</label>
            <input type="file" class="form-control" name="imagen_ejercicio" accept="image/*"
                value="{{ isset($imagenes) ? $imagenes->imagen_ejercicio : old('imagen_ejercicio') }}" required>
        </div>

    </div>
    @if (isset($ejercicio))
        <div class="col-12">
            <div class="form-group">
                <img src="{{ asset('storage') . '/' . $ejercicio->imagen_ejercicio }}" width="100">
            </div>

               <span>{{$ejercicio->descripcion}}</span>

        </div>
    @endif

</div>
<div>
