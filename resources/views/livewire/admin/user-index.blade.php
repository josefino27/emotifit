<div>

    <div class="card-header">
        <input wire:model="buscar" class="form-control" placeholder="Busquedad por nombre o correo">
    </div>

    @if ($users->count())
        <div class="card-body ">
            <div>
                <table class="table table-dark table-striped">
                    <thead>
                        <tr>
                            <th role="button" wire:click="order('id')">Id</th>
                            <th role="button" wire:click="order('name')">Nombre</th>
                            <th role="button" wire:click="order('email')">Email</th>
                            <th>Accion</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td width="10px">
                                    <a class="btn btn-primary" href="{{ route('users.edit', $user) }}">
                                        Editar </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card-footer">
            {{ $users->links() }}
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
