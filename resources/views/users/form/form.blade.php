@csrf
<div class="row">
    <div class="col-12">
        <div class="form-group">
            {!! Form::model($user, ['route' => ['users.update', $user], 'method' => 'put']) !!}

            {!! Form::label('name', 'Nombre:') !!}
            {!! Form::text('name', $user->name, ['class' => 'form-control']) !!}

            {!! Form::label('email', 'Correo:') !!}
            {!! Form::email('email', $user->email, ['class' => 'form-control']) !!}

            {!! Form::label('current_password', 'Contraseña actual:') !!}
            {!! Form::password('current_password', ['class' => 'form-control']) !!}

            {!! Form::label('password', 'Nueva contraseña:') !!}
            {!! Form::password('password', ['class' => 'form-control']) !!}

            {!! Form::label('password_confirmation', 'Confirmar contraseña:') !!}
            {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}

            @can('users')
                {!! Form::label('roles', 'Roles: ') !!}

                @foreach ($roles as $rol)
                    <div>
                        <label>
                            {!! Form::checkbox('roles[]', $rol->id, in_array($rol->id, $userRoles), ['class' => 'mr-1']) !!}
                            {{ $rol->name }}
                        </label>
                    </div>
                @endforeach
            @endcan

            {!! Form::submit('Actualizar', ['class' => 'btn btn-primary mt-2']) !!}

            {!! Form::close() !!}
        </div>


        </div>
    </div>

    <div>
