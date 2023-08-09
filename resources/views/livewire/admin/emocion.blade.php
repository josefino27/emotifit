<div>
    <div class="card-header">
        <input wire:model="search" class="form-control" placeholder="Busquedad por nombre">
    </div>

    @if($emociones->count())
    <div class="card-body">
        <div>
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th role="button" wire:click="order('id')">Id</th>
                        <th role="button" wire:click="order('nombre_emocion')">Nombre</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($emociones as $emocion)
                    <tr>
                        <td>{{ $emocion->id_emocion }}</td>
                        <td>{{ $emocion->nombre_emocion}}</td>
                        <td width="200px">
                            <a href="{{ route('emocion.show', $emocion->id_emocion) }}"><i class="fas fa-eye"></i></a>

                            <a href="{{ route('emocion.edit', $emocion->id_emocion) }}"><i class="fas fa-edit"></i></a>

                            <button type="submit" form="delete_{{ $emocion->id_emocion}}"
                                onclick="return confirm('¿estas seguro de eliminar el registro?')">
                                <i class="fas fa-trash"></i>
                                <form action="{{ route('emocion.destroy', $emocion->id_emocion) }}"
                                    id="delete_{{ $emocion->id_emocion }}" method="post" enctype="multipart/form-data"
                                    hidden>
                                    @csrf
                                    @method('delete')
                                </form>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer">
        {{$emociones->links()}}
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
