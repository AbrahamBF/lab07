<?php
// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Incluir la conexión a la base de datos
    require_once "../conexion.php";
    
    // Obtener los datos del formulario
    $nombre = mysqli_real_escape_string(conectar(), $_POST['nombre_autor']);
    $apellido_paterno = mysqli_real_escape_string(conectar(), $_POST['apellido_paterno']);
    $apellido_materno = mysqli_real_escape_string(conectar(), $_POST['apellido_materno']);

    
    // Definir la consulta SQL
    $sql = "INSERT INTO autores (nombre_autor, apellido_paterno, apellido_materno) VALUES ('$nombre', '$apellido_paterno', '$apellido_materno')";
    
    // Ejecutar la consulta
    if (mysqli_query(conectar(), $sql)) {
        // Obtener el ID del autor recién agregado
        $id_autor = mysqli_insert_id(conectar());
        
        // Redireccionar a la página de detalles del autor recién agregado
        header('Location: listar_autores.php');
        exit;
    } else {
        // Mostrar mensaje de error si no se pudo agregar el autor
        $error = "No se pudo agregar el autor: " . mysqli_error(conectar());
    }
}
?>

<h1>Agregar Autor</h1>

<?php if (isset($error)) { ?>
    <p style="color: red;"><?php echo $error; ?></p>
<?php } ?>

<form method="post">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" required><br>
    
    <label for="apellido_paterno">Apellido Paterno:</label>
    <input type="text" name="apellido_paterno" required><br>
    
    <label for="apellido_materno">Apellido Materno:</label>
    <input type="text" name="apellido_materno" required><br>
    
    <button type="submit">Agregar</button>
</form>
