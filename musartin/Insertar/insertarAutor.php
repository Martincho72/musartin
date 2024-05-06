<?php
require("./../ConexionBBDD/SesionIniciada.php");
require("./../ConexionBBDD/usarMusartin.php");

$nombre_autor = $_REQUEST["nombre_autor"];
$fecha_nacimiento = $_REQUEST["fecha_nacimiento"];
$nacionalidad = $_REQUEST["nacionalidad"];

$consulta = "INSERT INTO autores (autor_id, nombre, fecha_nacimiento, nacionalidad) VALUES
             (null, '$nombre_autor', '$fecha_nacimiento', '$nacionalidad');";

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