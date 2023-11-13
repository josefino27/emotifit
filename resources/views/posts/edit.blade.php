<!DOCTYPE html>
<html>
<head>
    <title>Editar Publicación</title>
</head>
<body>

<h1>Editar Publicación</h1>

<form action="{{ route('posts.update', $post) }}" method="post">
    @csrf
    @method('put') <!-- Esto es importante para indicar que se realizará una actualización -->

    <label for="title">Título:</label>
    <input type="text" name="title" id="title" value="{{ $post->title }}"><br>

    <label for="content">Contenido:</label><br>
    <textarea name="content" id="content" cols="30" rows="10">{{ $post->content }}</textarea><br>

    <!-- Otros campos de la publicación si los hay -->

    <button type="submit">Actualizar Publicación</button>
</form>

</body>
</html>
