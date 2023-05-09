<?php
// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Incluir la conexión a la base de datos
    require_once "../conexion.php";
    
    // Obtener los datos del formulario
    $id = $_POST['id'];
    $año = $_POST['año'];
    $autor = $_POST['autor'];
    $titulo = $_POST['titulo'];
    $url = $_POST['url'];
    $especialidad = $_POST['especialidad'];
    $editorial = $_POST['editorial'];
    
    // Editar el libro en la base de datos
    editarLibro($id, $año, $autor, $titulo, $url, $especialidad, $editorial);
} else {
    // Obtener el ID del libro a editar
    $id = $_GET['id'];
    
    // Obtener la información del libro de la base de datos
    $libro = obtenerLibro($id);
    
    // Mostrar el formulario para editar el libro
    ?>
    <html>
    <head>
        <title>Editar libro</title>
    </head>
    <body>
        <h1>Editar libro</h1>
        
        <form method="post" action="">
            <input type="hidden" name="id" value="<?php echo $libro['id']; ?>">
            
            <label>Año:</label>
            <input type="text" name="año" value="<?php echo $libro['año']; ?>" required><br><br>
            
            <label>Autor:</label>
            <input type="text" name="autor" value="<?php echo $libro['autor']; ?>" required><br><br>
            
            <label>Título:</label>
            <input type="text" name="titulo" value="<?php echo $libro['titulo']; ?>" required><br><br>
            
            <label>URL:</label>
            <input type="text" name="url" value="<?php echo $libro['url']; ?>" required><br><br>
            
            <label>Especialidad:</label>
            <input type="text" name="especialidad" value="<?php echo $libro['especialidad']; ?>" required><br><br>
            
            <label>Editorial:</label>
            <input type="text" name="editorial" value="<?php echo $libro['editorial']; ?>" required><br><br>
            
            <input type="submit" value="Editar libro">
        </form>
    </body>
    </html>
<?php } ?>