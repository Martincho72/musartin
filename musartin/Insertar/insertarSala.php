<?php
require("./../ConexionBBDD/SesionIniciada.php");
require("./../ConexionBBDD/usarMusartin.php");

$nombre_sala = $_REQUEST["nombre_sala"];
$ubicacion = $_REQUEST["ubicacion"];
$capacidadMaxima = $_REQUEST["capacidad_maxima"];

// Escapar caracteres especiales para evitar inyección SQL
$nombre_sala = $mysqli->real_escape_string($nombre_sala);
$ubicacion = $mysqli->real_escape_string($ubicacion);

$consulta = "INSERT INTO salas (sala_id, nombre, ubicacion, maximo_cuadros) VALUES
             (null, '$nombre_sala', '$ubicacion', '$capacidadMaxima');";

if (!$resultado = $mysqli->query($consulta)) {
    echo "Lo sentimos. La Aplicación no funciona<br>";
    echo "Error en la consulta: ".$consulta."<br>";
    echo "Num.error: ".$mysqli->errno."<br>";
    echo "Error: ".$mysqli->error. "<br>";
    exit;
} else {
    echo "Sala Insertada";
}
echo "<br> <a href='../insertar.php'>Volver</a>";
?>