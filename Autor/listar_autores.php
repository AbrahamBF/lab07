    <?php
    // Incluir la conexión a la base de datos
    require_once "../conexion.php";

    // Definir la consulta SQL
    $sql = "SELECT * FROM autores";

    // Ejecutar la consulta
    $resultado = mysqli_query(conectar(), $sql);

    // Mostrar la tabla con los autores
    echo "<table>";
    echo "<tr><th>ID</th><th>Nombre</th><th>Apellido Paterno</th><th>Apellido Materno</th><th>Acciones</th></tr>";
    while ($fila = mysqli_fetch_assoc($resultado)) {
        echo "<tr>";
        echo "<td>" . $fila['id_autor'] . "</td>";
        echo "<td>" . $fila['nombre_autor'] . "</td>";
        echo "<td>" . $fila['apellido_paterno'] . "</td>";
        echo "<td>" . $fila['apellido_materno'] . "</td>";
        echo "<td><a href='editar_autor.php?id=" . $fila['id_autor'] . "'>Editar</a> <a href='eliminar_autor.php?id=" . $fila['id_autor'] . "'>Eliminar</a></td>";
        echo "</tr>";
    }
    echo "</table>";

    // Liberar la memoria del resultado
    mysqli_free_result($resultado);

    // Cerrar la conexión a la base de datos
    mysqli_close(conectar());
    ?>