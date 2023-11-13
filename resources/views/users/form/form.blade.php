@csrf
<div class="row">
    <div class="col-12">
        <div class="form-group">

            {!! Form::model($user, ['route' => ['users.update', $user], 'method' => 'put']) !!}
            {!! Form::label('nombre','Nombre:') !!}
            {!! Form::text('nombre',$user->name,['class' => 'form-control']) !!}
            {!!Form::label('email', 'Correo:') !!}
            {!! Form::email($user->email,$user->email,['class' => 'form-control'])!!}
            {!!Form::label('roles', 'Roles: ') !!}

            @foreach ($roles as $rol)
                <div>
                    <label>
                        {!! Form::checkbox('roles[]', $rol->id, in_array($rol->id, $userRoles), ['class' => 'mr-1']) !!}
                        {{ $rol->name }}
                    </label>
                </div>
            @endforeach

            {!! Form::submit('Actualizar', ['class' => 'btn btn-primary mt2']) !!}

            {!! Form::close() !!}

        </div>
    </div>

    <div>
