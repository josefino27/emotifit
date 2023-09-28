<div>

    <div class="card-header">
        <input wire:model="buscar" class="form-control" placeholder="Busquedad por nombre o correo">
    </div>

    @if ($emocionxusuario->count())
        <div class="card-body ">
            <div>
                <table class="table table-dark table-striped">
                    <thead>
                        <tr>
                            <th role="button" wire:click="order('id_emocionxusuario')">Id</th>
                            <th role="button" wire:click="order('id_emocion')">Emocion</th>
                            <th role="button" wire:click="order('id_usuario')">Usuario</th>
                            <th role="button" wire:click="order('created_at')">Fecha</th>
                            <th>Accion</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($emocionxusuario as $userxemocion)
                            <tr>
                                <td>{{ $userxemocion->id_emocionxusuario }}</td>
                                <td>{{ $userxemocion->id_emocion }}</td>
                                <td>{{ $userxemocion->user->name }}</td>
                                <td>{{ $userxemocion->created_at->format('d/m/Y h:i A') }}</td>
                                <td width="10px">
                                    <a class="btn btn-primary" href="{{ route('userxemocion.edit', $userxemocion->id_emocionxusuario) }}">
                                        Editar </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card-footer">
            {{ $emocionxusuario->links() }}
        </div>
    @else
        <div class="car-body">
            <div class="alert alert-warning alert-dismissible" role="alert">

                <strong>
                    Advertencia,
                </strong>
                No coincide con mas registros
                <button type="button" 
                class="btn-close" 
                data-bs-dismiss="alert" 
                aria-label="Close">
                </button>
            </div>
        </div>
    @endif
</div>
