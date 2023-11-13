@extends('layouts.app')

@section('content')

<h1>{{ $post->titulo }}</h1>

<p>{{ $post->descripcion }}</p>

<!-- Otros detalles de la publicación si los hay -->

@endsection
