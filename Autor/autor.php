<?php
// Incluir la conexión a la base de datos
require_once "conexion.php";

// Función para mostrar la lista de autores
function listarAutores() {
    $conexion = conectar();

    // Consultar la lista de autores
    $query = "SELECT * FROM autores";
    $result = $conexion->query($query);

    // Verificar si hay resultados
    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>ID</th><th>Nombre</th><th>Apellido Paterno</th><th>Apellido Materno</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["nombre"] . "</td>";
            echo "<td>" . $row["apellido_paterno"] . "</td>";
            echo "<td>" . $row["apellido_materno"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No se encontraron autores.";
    }

    // Cerrar la conexión
    $conexion->close();
}

// Función para agregar un nuevo autor
function agregarAutor($nombre, $apellido_paterno, $apellido_materno) {
    $conexion = conectar();

    // Preparar la consulta
    $stmt = $conexion->prepare("INSERT INTO autores (nombre, apellido_paterno, apellido_materno) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nombre, $apellido_paterno, $apellido_materno);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        echo "Autor agregado correctamente.";
    } else {
        echo "Error al agregar el autor: " . $stmt->error;
    }

    // Cerrar la conexión
    $conexion->close();
}

// Función para editar un autor existente
function editarAutor($id, $nombre, $apellido_paterno, $apellido_materno) {
    $conexion = conectar();

    // Preparar la consulta
    $stmt = $conexion->prepare("UPDATE autores SET nombre = ?, apellido_paterno = ?, apellido_materno = ? WHERE id = ?");
    $stmt->bind_param("sssi", $nombre, $apellido_paterno, $apellido_materno, $id);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        echo "Autor editado correctamente.";
    } else {
        echo "Error al editar el autor: " . $stmt->error;
    }

    // Cerrar la conexión
    $conexion->close();
}

// Función para eliminar un autor existente
function eliminarAutor($id) {
    $conexion = conectar();

    // Preparar la consulta
    $stmt = $conexion->prepare("DELETE FROM autores WHERE id = ?");
    $stmt->bind_param("i", $id);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        echo "Autor eliminado correctamente.";
    } else {
        echo "Error al eliminar el autor: " . $stmt->error;
    }

    // Cerrar la conexión
    $conexion->close();
}
?>
