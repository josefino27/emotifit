<div>
    <div class="card-header">
        <select class="form-control mr-sm-2"  wire:model="selectedRutina">
            <option value=''>Selecciona rutina de ejercicios</option>
            @foreach ($rutinas as $rutina)
                  <option value="{{$rutina->nombre_rutina}}" > {{$rutina->id_rutina}}-{{$rutina->nombre_rutina}}</option>
            @endforeach
         </select>
     <input type="text"  class="form-control" value="" wire:model="search" readonly >
    </div>
    @if($selectedRutina!="")
    <div>
        @if ($rutinaEjercicios->count())
            <div class="card-body ">
                <div>
                    <table class="table table-dark table-striped">
                        <thead>
                            <tr>
                                <th role="button" wire:click="order('nombre_rutina')">Nombre Rutina</th>
                                <th role="button" wire:click="order('nombre_ejercicio')">Ejercicio</th>
                                <th role="button" wire:click="order('tipo')">Serie</th>
                                <th role="button" wire:click="order('repeticiones')">Repeticiones</th>
                                <th role="button" wire:click="order('duracion_segundos')">Segundos</th>
                            </tr>
                        </thead>
    
                        <tbody>
                            @foreach ($rutinaEjercicios as $rutinaEjercicio)
                                <tr>
                                    <td>{{ $rutinaEjercicio->nombre_rutina }}</td>
                                    <td>{{ $rutinaEjercicio->nombre_ejercicio }}</td>
                                    <td>{{ $rutinaEjercicio->tipo }}</td>

                                    <td>{{ $rutinaEjercicio->repeticiones }}</td>
                                    <td>{{ $rutinaEjercicio->duracion_segundos }}</td>
                                    {{-- <td width="200px">
                                        <a href="{{ route('ejercicios.show', $ejercicio->id_ejercicio) }}"><i
                                                class="fas fa-eye"></i></a>
                                        @can('users')
                                            <a href="{{ route('ejercicios.edit', $ejercicio->id_ejercicio) }}"><i
                                                    class="fas fa-edit"></i></a>
    
                                            <button type="submit" form="delete_{{ $ejercicio->id_ejercicio }}"
                                                onclick="return confirm('¿estas seguro de eliminar el registro?')">
                                                <i class="fas fa-trash"></i>
                                                <form action="{{ route('ejercicios.destroy', $ejercicio->id_ejercicio) }}"
                                                    id="delete_{{ $ejercicio->id_ejercicio }}" method="post"
                                                    enctype="multipart/form-data" hidden>
                                                    @csrf
                                                    @method('delete')
                                                </form>
                                            </button>
                                        @endcan
                                    </td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
    
            <div class="card-footer">
                {{ $rutinaEjercicios->links() }}
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
    @endif
    
</div>