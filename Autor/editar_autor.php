<?php
// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Incluir la conexión a la base de datos
    require_once "../conexion.php";
    
    // Obtener los datos del formulario
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellido_paterno = $_POST['apellido_paterno'];
    $apellido_materno = $_POST['apellido_materno'];
    
    // Definir la consulta SQL
    $sql = "UPDATE autores SET nombre='$nombre', apellido_paterno='$apellido_paterno', apellido_materno='$apellido_materno' WHERE id=$id";
    
    // Ejecutar la consulta SQL
    if ($conn->query($sql) === TRUE) {
        // Redireccionar a la página de listado de autores
        header('Location: listar_autores.php');
        exit;
    } else {
        // Mostrar un mensaje de error en caso de fallo en la ejecución de la consulta SQL
        echo 'Error: ' . $conn->error;
    }
}

// Obtener el id del autor a editar
if (!isset($_GET['id'])) {
    // Redireccionar a la página de listado de autores si no se ha especificado un id
    header('Location: listar_autores.php');
    exit;
}
$id = $_GET['id'];

// Obtener los datos del autor
$sql = "SELECT * FROM autores WHERE id=$id";
$resultado = $conn->query($sql);
if ($resultado->num_rows == 0) {
    // Redireccionar a la página de listado de autores si no se encontró un autor con el id especificado
    header('Location: listar_autores.php');
    exit;
}
$autor = $resultado->fetch_assoc();

// Cerrar la conexión a la base de datos
$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Editar autor</title>
</head>
<body>
    <h1>Editar autor</h1>
    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $autor['id']; ?>">
        <p>
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" required value="<?php echo $autor['nombre']; ?>">
        </p>
        <p>
            <label for="apellido_paterno">Apellido paterno:</label>
            <input type="text" name="apellido_paterno" id="apellido_paterno" required value="<?php echo $autor['apellido_paterno']; ?>">
        </p>
        <p>
            <label for="apellido_materno">Apellido materno:</label>
            <input type="text" name="apellido_materno" id="apellido_materno" required value="<?php echo $autor['apellido_materno']; ?>">
        </p>
        <p>
            <button type="submit">Guardar cambios</button>
        </p>
    </form>
</body>
</html>