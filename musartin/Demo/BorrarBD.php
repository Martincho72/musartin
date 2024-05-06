<?php
$servidor = "localhost";
$usuario = "root";
$clave = "";

$mysqli = new mysqli($servidor, $usuario, $clave);
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: " . $mysqli->connect_error . " " . $mysqli->connect_errno;
    die("<br> Salida del programa. Fatal Error");
}

$basedatos = "musartin";

$resultado = $mysqli->query("SHOW DATABASES LIKE '$basedatos'");
if ($resultado->num_rows == 1) {
    $consulta = "DROP DATABASE $basedatos";

    if (!$mysqli->query($consulta)) {
        echo "Error al borrar la Base de datos: " . $mysqli->error;
    } else {
        echo "La base de datos ha sido borrada exitosamente.";
    }
} else {
    echo "No se puede borrar la base de datos, no existe.";
}

$mysqli->close();
echo  "<br> <a href='../acceso.php'>Volver</a>"
?>
