<?php
require("./../ConexionBBDD/SesionIniciada.php");
// Requerir el archivo de conexión a la base de datos
require("./../ConexionBBDD/usarMusartin.php");

// Obtener los valores del formulario
$nombre_autor = $_REQUEST["nombre_autor"];
$fecha_nacimiento = $_REQUEST["fecha_nacimiento"];
$nacionalidad = $_REQUEST["nacionalidad"];

// Construir la consulta SQL para insertar el autor
$consulta = "INSERT INTO autores (autor_id, nombre, fecha_nacimiento, nacionalidad) VALUES
             (null, '$nombre_autor', '$fecha_nacimiento', '$nacionalidad');";

// Ejecutar la consulta
if (!$resultado = $mysqli->query($consulta)) {
    echo "Lo sentimos. La Aplicación no funciona<br>";
    echo "Error en la consulta: ".$consulta."<br>";
    echo "Num.error: ".$mysqli->errno."<br>";
    echo "Error: ".$mysqli->error. "<br>";
    exit;
} else {
    echo "Autor Insertado";
}
echo  "<br> <a href='../insertar.php'>Volver</a>"
?>
