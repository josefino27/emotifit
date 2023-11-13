<!-- resources/views/posts/index.blade.php -->

@extends('layouts.app') <!-- Puedes personalizar esto según tu estructura de diseño -->

@section('content')

    <h1>Lista de Publicaciones</h1>

    @if(isset($posts) && count($posts) > 0)
        <ul>
            @foreach($posts as $post)
                <li>
                    <a href="{{ route('posts.show', $post) }}">
                        {{ $post->titulo }}
                    </a>
                </li>
            @endforeach
        </ul>
    @else
        <p>No hay publicaciones disponibles.</p>
    @endif

@endsection
