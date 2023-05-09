<?php
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Incluir la conexión a la base de datos
    require_once "../conexion.php";
    
    // Obtener los datos del formulario
    $año = $_POST["año_libro"];
    $autor = $_POST["autor_libro"];
    $titulo = $_POST["titulo_libro"];
    $url = $_POST["url"];
    $especialidad = $_POST["especialidad"];
    $editorial = $_POST["editorial"];
    
    // Agregar el libro a la base de datos
    agregarLibro($año, $autor, $titulo, $url, $especialidad, $editorial);
}
?>
<html>
<head>
    <title>Agregar libro</title>
</head>
<body>
    <h1>Agregar libro</h1>
    <form method="post" action="">
        <label>Año:</label>
        <input type="text" name="año" required><br><br>
    
        <label>Autor:</label>
        <input type="text" name="autor" required><br><br>
    
        <label>Título:</label>
        <input type="text" name="titulo" required><br><br>
    
        <label>URL:</label>
        <input type="text" name="url" required><br><br>
    
        <label>Especialidad:</label>
        <input type="text" name="especialidad" required><br><br>
    
        <label>Editorial:</label>
        <input type="text" name="editorial" required><br><br>
    
        <input type="submit" value="Agregar libro">
    </form>
</body>
</html>