<?php

require_once "../conexion.php";

function listarLibros()
{
    $conexion = conectar();
    
    // Definir la consulta SQL
    $sql = "SELECT * FROM libros";
    
    // Ejecutar la consulta
    $resultado = $conexion->query($sql);
    
    // Comprobar si se obtuvieron resultados
    if ($resultado->num_rows > 0) {
        // Crear una tabla para mostrar los resultados
        echo "<table>";
        echo "<tr><th>ID</th><th>Año</th><th>Autor</th><th>Título</th><th>URL</th><th>Especialidad</th><th>Editorial</th><th>Acciones</th></tr>";
        
        // Mostrar cada resultado como una fila de la tabla
        while ($fila = $resultado->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $fila['id'] . "</td>";
            echo "<td>" . $fila['año'] . "</td>";
            echo "<td>" . $fila['autor'] . "</td>";
            echo "<td>" . $fila['titulo'] . "</td>";
            echo "<td>" . $fila['url'] . "</td>";
            echo "<td>" . $fila['especialidad'] . "</td>";
            echo "<td>" . $fila['editorial'] . "</td>";
            echo "<td><a href='editar_libro.php?id=" . $fila['id'] . "'>Editar</a> | <a href='eliminar_libro.php?id=" . $fila['id'] . "'>Eliminar</a> | <a href='leer_libro.php?url=" . $fila['url'] . "' target='_blank'>Leer</a></td>";
            echo "</tr>";
        }
        
        echo "</table>";
    } else {
        echo "No se encontraron resultados.";
    }
    
    // Cerrar la conexión a la base de datos
    $conexion->close();
}

function agregarLibro($año, $autor, $titulo, $url, $especialidad, $editorial)
{
    $conexion = conectar();
    
    // Escapar los datos para evitar inyección SQL
    $año = $conexion->real_escape_string($año);
    $autor = $conexion->real_escape_string($autor);
    $titulo = $conexion->real_escape_string($titulo);
    $url = $conexion->real_escape_string($url);
    $especialidad = $conexion->real_escape_string($especialidad);
    $editorial = $conexion->real_escape_string($editorial);
    
    // Definir la consulta SQL
    $sql = "INSERT INTO libros (año, autor, titulo, url, especialidad, editorial) VALUES ('$año', '$autor', '$titulo', '$url', '$especialidad', '$editorial')";
    
    // Ejecutar la consulta
    if ($conexion->query($sql) === TRUE) {
        echo "El libro ha sido agregado correctamente.";
    } else {
        echo "Error: " . $sql . "<br>" . $conexion->error;
    }
    
    // Cerrar la conexión a la base de datos
    $conexion->close();
}

function editarLibro($id, $año, $autor, $titulo, $url, $especialidad, $editorial)
{
    $conexion = conectar();
    
    // Escapar los datos para evitar inyección SQL
    $id = $conexion->real_escape_string($id);
    $año = $conexion->real_escape_string($año);
    $autor = $conexion->real_escape_string($autor);
    $titulo = $conexion->real_escape_string($titulo);
    $url = $conexion->real_escape_string($url);
    $especialidad = $conexion->real_escape_string($especialidad);
    $editorial = $conexion->real_escape_string($editorial);

    // Definir la consulta SQL
    $sql = "UPDATE libros SET año='$año', autor='$autor', titulo='$titulo', url='$url', especialidad='$especialidad', editorial='$editorial' WHERE id='$id'";

    // Ejecutar la consulta
    if ($conexion->query($sql) === TRUE) {
        echo "El libro ha sido editado correctamente.";
    } else {
        echo "Error: " . $sql . "<br>" . $conexion->error;
    }

    // Cerrar la conexión a la base de datos
    $conexion->close();
}