<?php
// Incluir la conexión a la base de datos
require_once "../conexion.php";

// Obtener todos los libros de la base de datos
$libros = obtenerLibros();

// Mostrar la lista de libros
?>
<html>
<head>
    <title>Listado de libros</title>
</head>
<body>
    <h1>Listado de libros</h1>
    
    <table>
        <tr>
            <th>ID</th>
            <th>Año</th>
            <th>Autor</th>
            <th>Título</th>
            <th>URL</th>
            <th>Especialidad</th>
            <th>Editorial</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($libros as $libro) { ?>
        <tr>
            <td><?php echo $libro['id']; ?></td>
            <td><?php echo $libro['año']; ?></td>
            <td><?php echo $libro['autor']; ?></td>
            <td><?php echo $libro['titulo']; ?></td>
            <td><?php echo $libro['url']; ?></td>
            <td><?php echo $libro['especialidad']; ?></td>
            <td><?php echo $libro['editorial']; ?></td>
            <td>
                <a href="leer_libro.php?id=<?php echo $libro['id']; ?>">Ver</a>
                <a href="editar_libro.php?id=<?php echo $libro['id']; ?>">Editar</a>
                <a href="eliminar_libro.php?id=<?php echo $libro['id']; ?>" onclick="return confirm('¿Estás seguro de que quieres eliminar este libro?')">Eliminar</a>
            </td>
        </tr>
        <?php } ?>
    </table>
    
    <a href="agregar_libro.php">Agregar libro</a>
</body>
</html>