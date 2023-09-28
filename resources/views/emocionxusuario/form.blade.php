<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('id_emocion') }}
            {{ Form::select('id_emocion', $emociones, $emocionxusuario->id_emocion, ['class' => 'form-control' . ($errors->has('id_emocion') ? ' is-invalid' : ''), 'placeholder' => 'Id Emocion']) }}
            {!! $errors->first('id_emocion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('usuario') }}
            {{ Form::text('id_usuario', $user->id, ['class' => 'form-control' . ($errors->has('id_usuario') ? ' is-invalid' : ''), 'placeholder' => 'Usuario', 'readonly' => 'true']) }}
            {!! $errors->first('id_usuario', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::text('nombre_usuario', $user->name, ['class' => 'form-control' . ($errors->has('id_usuario') ? ' is-invalid' : ''), 'placeholder' => 'Usuario', 'readonly' => 'true']) }}
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>