<div>
    <div class="card-header">
        <input wire:model="buscar" class="form-control" placeholder="Busquedad por nombre o correo">
    </div>


    @if ($reservas->count())
        <div class="card-body ">
            <div>
                <table class="table table-dark table-striped">
                    <thead>
                        <tr>
                            <th role="button" wire:click="order('id_reserva')">Id Reserva</th>
                            <th role="button" wire:click="order('id_clase')">Clase</th>
                            <th role="button" wire:click="order('id_usuario')">Usuario</th>
                            <th>Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reservas as $reserva)
                            <tr>
                                <td>{{ $reserva->id_reserva }}</td>
                                <td>{{ $reserva->nombreClase }}</td>
                                <td>{{ $reserva->name }}</td>
                                <td width="200px">
                                    <a href="{{ route('reservas.show', $reserva->id_reserva) }}">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    @can('users')
                                        <a href="{{ route('reservas.edit', $reserva->id_reserva) }}"><i
                                                class="fas fa-edit"></i></a>
                                        <button type="submit" form="delete_{{ $reserva->id_reserva }}"
                                            onclick="return confirm('¿estas seguro de eliminar el registro?')">
                                            <i class="fas fa-trash"></i>
                                            <form action="{{ route('reservas.destroy', $reserva->id_reserva) }}"
                                                id="delete_{{ $reserva->id_reserva }}" method="post"
                                                enctype="multipart/form-data" hidden>
                                                @csrf
                                                @method('delete')
                                            </form>
                                        </button>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            {{ $reservas->links() }}
        </div>
       
        @else
        <div class="car-body">
            <div class="alert alert-warning alert-dismissible" role="alert">
                <strong>
                    Advertencia,
                </strong>
                No coincide con mas registros
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
            </div>
        </div>
    @endif
</div>
