<!DOCTYPE html>
<html>
<head>
    <title>Crear Nueva Publicación</title>
</head>
<body>

<h1>Crear Nueva Publicación</h1>

<form action="{{ route('posts.store') }}" method="post">
    @csrf
    <label for="title">Título:</label>
    <input type="text" name="title" id="title"><br>

    <label for="content">Contenido:</label><br>
    <textarea name="content" id="content" cols="30" rows="10"></textarea><br>

    <!-- Otros campos de la publicación si los hay -->

    <button type="submit">Guardar Publicación</button>
</form>

</body>
</html>
