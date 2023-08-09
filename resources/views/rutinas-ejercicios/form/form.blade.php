@csrf
@if(isset($rutina))
<div class="row">
    <div class="col">
        <label for="nombre_rutina" class="form-label"># {{$rutina->id_rutina}}</label>
        <label for="nombre_rutina" class="form-label">{{$rutina->nombre_rutina}}</label>
        <input wire:model="search" type="text" name="id_rutina" id="id_rutina" value="{{isset($rutina)?$rutina->id_rutina:old('id_rutina')}}" hidden>
    </div>
</div>
@endif
@if(isset($rutinaEjercicios))
<div class="row">
    <div class="col">
        <label for="nombre_rutina" class="form-label"># {{$rutinaEjercicios[0]->id_rutina}} </label>
        <label for="nombre_rutina" class="form-label">Nombre: {{$rutinaEjercicios[0]->nombre_rutina}} </label>
        <label for="nombre_rutina" class="form-label">Dia(s): {{$rutinaEjercicios[0]->dia_entreno}} </label>
        <label for="nombre_rutina" class="form-label">Descripcion: {{$rutinaEjercicios[0]->descripcion_rutina}} </label>
    </div>
    <div class="row">
        <input wire:model="search" type="text" name="id_rutina" id="id_rutina" value="{{isset($rutinaEjercicios)?$rutinaEjercicios[0]->id_rutina:old('id_rutina')}}" hidden>
    </div>
</div> 
<div class="card-body">
    <table class="table">
        <thead>
            <tr>
                <th role="button" wire:click="order('nombre_ejercicio')">Nombre</th>
                <th role="button" wire:click="order('repeticiones')">Descripcion</th>
                <th role="button" wire:click="order('series')">Repeticiones</th>
                <th role="button" wire:click="order('descripcion')">Series</th>
                <th role="button">Accion</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($rutinaEjercicios as $item) 
            <tr>
                <td><p> {{$item->nombre_ejercicio;}}</p></td>
                <td><p> {{$item->descripcion;}}</p></td>
                <td><p> {{$item->repeticiones;}}</p></td>
                <td><p> {{$item->series;}}</p></td>
                <td width="200px">
                   
                    @can('users')
                        {{-- <button type="submit" form="delete_{{ $item->id_rutina_ejercicio }}"
                            onclick="return confirm('¿estas seguro de eliminar el ejercicio de esta rutina?')">
                            <i class="fas fa-trash"></i>
                            <form action="{{ route('rutinasEjercicios.destroy', $item->id_rutina_ejercicio) }}"
                                id="delete_{{ $item->id_rutina_ejercicio }}" method="post"
                                enctype="multipart/form-data" hidden>
                                @csrf
                                @method('delete')
                            </form>
                        </button> --}}
                    @endcan
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="card-footer">
    {{ $rutinaEjercicios->links() }}
</div> 
@endif
<div class="row">
    <div class="col-md-3">
        <label for="option" class="form-label">Ejercicio</label>
        <select name="id_ejercicio">
            @foreach ($ejercicios as $ejercicio)
            <option id="id_ejercicio" name="id_ejercicio" value="{{$ejercicio->id_ejercicio}}">{{$ejercicio->nombre_ejercicio}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-3">
        <label for="repeticion" class="form-label">Repeticiones</label>
        <input type="number" id="repeticiones" name="repeticiones" style="width:50px;">
    </div>
    <div class="col-md-3">
        <label for="" class="form-label">Series</label>
        <input type="number" id="series" name="series" style="width:50px;">
    </div>
</div>
