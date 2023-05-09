<?php
// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Incluir la conexión a la base de datos
    require_once "../conexion.php";
    
    // Obtener el ID del libro a eliminar
    $id = $_POST['id'];
    
    // Eliminar el libro de la base de datos
    eliminarLibro($id);
    
    // Redireccionar a la página de listar libros
    header('Location: listar_libros.php');
} else {
    // Obtener el ID del libro a eliminar
    $id = $_GET['id'];
    
    // Obtener la información del libro de la base de datos
    $libro = obtenerLibro($id);
    
    // Mostrar el formulario para confirmar la eliminación del libro
    ?>
    
    <html>
    <head>
        <title>Eliminar libro</title>
    </head>
    <body>
        <h1>Eliminar libro</h1>
        
        <p>¿Estás seguro que deseas eliminar el libro "<?php echo $libro['titulo']; ?>"?</p>
        
        <form method="post" action="">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="submit" value="Sí">
            <a href="listar_libros.php">No</a>
        </form>
    </body>
    </html>
    
    <?php
}
?>