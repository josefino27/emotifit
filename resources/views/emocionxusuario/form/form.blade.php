@csrf
<div class="row">
    <div class="col-4">
        <div class="form-group">
            <label for="">ID Usuario</label>
            <input type="text" class="form-control" name="user_id"
                value="{{ isset($user) ? $user->id : old('user_id') }}" required readonly>
        </div>
    </div>
    <div class="col-4">
        <div class="form-group">
            <label for="">Nombre Usuario</label>
            <input type="text" class="form-control" name="user_name"
                value="{{ isset($user) ? $user->name : old('user_name') }}" required readonly>
        </div>
    </div>
    <div class="col-4">
        <div class="form-group">
            <label for="">Emocion de Hoy</label><br>
            <select name="emociones" id="emociones" class="form-control">
                @foreach($emociones as $emocion)
                <option value="{{$emocion->id_emocion}}">{{$emocion->nombre_emocion}}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>