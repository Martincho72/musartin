<?php
$servidor = "localhost";
$usuario = "root";
$clave = "";
$basedatos = "musartin";

try {
    $mysqli = new mysqli($servidor, $usuario, $clave);

    if ($mysqli->connect_errno) {
        throw new Exception("Fallo al conectar a MySQL: " . $mysqli->connect_error . " " . $mysqli->connect_errno);
    }

    $resultado = $mysqli->query("SHOW DATABASES LIKE '$basedatos'");
    if ($resultado->num_rows == 0) {
        throw new Exception("No se pudo conectar a la base de datos porque no existe.");
    }

    $mysqli->close();
} catch (Exception $error) {
    echo "<script>alert('" . $error->getMessage() . "');</script>";
    echo "<script>window.location.href = './acceso.php';</script>";
    exit();
}
?>
