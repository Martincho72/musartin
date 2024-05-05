<?php
$servidor = "localhost";
$usuario = "root";
$clave = "";

// Conexión a MySQL
$mysqli = new mysqli($servidor, $usuario, $clave);
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: " . $mysqli->connect_error . " " . $mysqli->connect_errno;
    die("<br> Salida del programa. Fatal Error");
}

// Nombre de la base de datos
$basedatos = "musartin";

// Verificar si la base de datos existe
$resultado = $mysqli->query("SHOW DATABASES LIKE '$basedatos'");
if ($resultado->num_rows == 1) {
    header('Location: ../index.php');
} else {
    // La base de datos no existe
    echo "<script>alert('No se pudo conectar a la base de datos porque no existe, redirigiendo a creación');</script>";
    // Redirigir de vuelta a la página de inicio de sesión después de mostrar el mensaje de error
    echo "<script>window.location.href = '../CrearBorrar.php';</script>";}

// Cerrar la conexión a MySQL
$mysqli->close();
?>
