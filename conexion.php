<?php
// Credenciales de la base de datos
$host = "localhost";
$user = "root";
$password = "usbw";
$dbname = "laboratorio-07";

// Crear la conexión
function conectar() {
    global $host, $user, $password, $dbname;
    $conexion = new mysqli($host, $user, $password, $dbname);

    // Verificar si hay errores de conexión
    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    return $conexion;
}
?>
