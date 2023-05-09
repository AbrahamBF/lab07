<?php
// Incluir la conexión a la base de datos
require_once "../conexion.php";

// Obtener el ID del libro a leer
$id = $_GET['id'];

// Obtener la información del libro de la base de datos
$libro = obtenerLibro($id);

// Mostrar la información del libro
?>
    
<html>
<head>
    <title>Leer libro</title>
</head>
<body>
    <h1><?php echo $libro['titulo']; ?></h1>
    
    <p><strong>Año:</strong> <?php echo $libro['año']; ?></p>
    <p><strong>Autor:</strong> <?php echo $libro['autor']; ?></p>
    <p><strong>URL:</strong> <a href="<?php echo $libro['url']; ?>"><?php echo $libro['url']; ?></a></p>
    <p><strong>Especialidad:</strong> <?php echo $libro['especialidad']; ?></p>
    <p><strong>Editorial:</strong> <?php echo $libro['editorial']; ?></p>
</body>
</html>