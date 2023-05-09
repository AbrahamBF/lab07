<?php
// Obtener la conexión a la base de datos
require_once "../conexion.php";
$conn = conectar();

// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener el id del autor a eliminar
    $id = $_POST['id'];
    
    // Definir la consulta SQL
    $sql = "DELETE FROM autores WHERE id=$id";
    
    // Ejecutar la consulta
    if ($conn->query($sql) === TRUE) {
        // Redirigir a la página de listado de autores
        header('Location: listar_autores.php?id=');
        exit;
    } else {
        // Mostrar un mensaje de error en caso de que la consulta falle
        echo 'Error al eliminar el autor: ' . $conn->error;
    }
}

// Cerrar la conexión a la base de datos
$conn->close();
?>