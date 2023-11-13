<!DOCTYPE html>
<html>
<head>
    <title>Confirmar Eliminación de Publicación</title>
</head>
<body>

<h1>Confirmar Eliminación</h1>

<p>¿Estás seguro de que deseas eliminar esta publicación?</p>

<form action="{{ route('posts.delete', $post) }}" method="post">
    @csrf
    @method('delete') <!-- Esto es importante para indicar que se realizará una eliminación -->

    <button type="submit">Eliminar</button>
</form>

</body>
</html>
