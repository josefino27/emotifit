
    @if ($rutina->count())
        <div class="card-body ">
            <div>
                <table class="table table-dark table-striped">
                    <thead>
                        <tr>
                            <th role="button" wire:click="order('id_rutina')">ID</th>
                            <th role="button" wire:click="order('nombre_rutina')">Nombre Rutina</th>
                            <th role="button" wire:click="order('dia_entreno')">Dia Entreno</th>
                            <th role="button" wire:click="order('descripcion_rutina')">Descripcion</th>
                            <th>Accion</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($rutina as $rutinas)
                            <tr>
                                <td>{{ $rutinas->id_rutina }}</td>
                                <td>{{ $rutinas->nombre_rutina }}</td>
                                <td>{{ $rutinas->dia_entreno }}</td>
                                <td>{{ $rutinas->descripcion_rutina }}</td>
                                <td width="200px">
                                    <a href="{{ route('rutinas.show', $rutinas->id_rutina) }}"><i
                                            class="fas fa-eye"></i></a>
                                    @can('users')
                                        <a href="{{ route('rutinas.edit', $rutinas->id_rutina) }}"><i
                                                class="fas fa-edit"></i></a>

                                        <button type="submit" form="delete_{{ $rutinas->id_rutina }}"
                                            onclick="return confirm('¿estas seguro de eliminar el registro?')">
                                            <i class="fas fa-trash"></i>
                                            <form action="{{ route('rutinas.destroy', $rutinas->id_rutina) }}"
                                                id="delete_{{ $rutinas->id_rutina }}" method="post"
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
            {{ $ejercicios->links() }}
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
