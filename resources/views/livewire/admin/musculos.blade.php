<div>
    <div class="card-header">
        <input wire:model="search" class="form-control" placeholder="Busquedad por nombre">
    </div>

    @if ($musculos->count())
        <div class="card-body ">
            <div>
                <table class="table table-dark table-striped">
                    <thead>
                        <tr>
                            <th role="button" wire:click="order('id')">Id</th>
                            <th role="button" wire:click="order('nombre-musculo')">Nombre</th>
                            <th>Accion</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($musculos as $musculo)
                            <tr>
                                <td>{{ $musculo->id }}</td>
                                <td>{{ $musculo->nombre}}</td>
                                <td width="200px">
                                    <a href="{{ route('musculos.show', $musculo->id) }}"><i class="fas fa-eye"></i></a>
    
                                    <a href="{{ route('musculos.edit', $musculo->id) }}"><i class="fas fa-edit"></i></a>
    
                                    <button type="submit" form="delete_{{ $musculo->id}}"
                                        onclick="return confirm('¿estas seguro de eliminar el registro?')">
                                        <i class="fas fa-trash"></i>
                                        <form action="{{ route('musculos.destroy', $musculo->id) }}"
                                            id="delete_{{ $musculo->id }}" method="post" enctype="multipart/form-data"
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
