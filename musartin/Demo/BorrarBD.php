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
    // La base de datos existe, se procede a borrarla
    $consulta = "DROP DATABASE $basedatos";

    if (!$mysqli->query($consulta)) {
        // Error al borrar la base de datos
        echo "Error al borrar la Base de datos: " . $mysqli->error;
    } else {
        // La base de datos ha sido borrada exitosamente
        echo "La base de datos ha sido borrada exitosamente.";
    }
} else {
    // La base de datos no existe
    echo "No se puede borrar la base de datos, no existe.";
}

// Cerrar la conexión a MySQL
$mysqli->close();
echo  "<br> <a href='../CrearBorrar.php'>Volver</a>"
?>
