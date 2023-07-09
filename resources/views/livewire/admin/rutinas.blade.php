<div>
    @foreach ($ejercicios as $ejercicio)

    <ul>
        <li>{{$ejercicio->nombre_ejercicio}}</li>
    </ul>
        
    @endforeach
</div>
