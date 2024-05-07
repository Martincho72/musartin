<?php
require("./../ConexionBBDD/SesionIniciada.php");
require("./../ConexionBBDD/usarMusartin.php");

$autor_id = $_REQUEST["autor_id"];
$nombre_autor = $_REQUEST["nombre"];
$fecha_nacimiento = $_REQUEST["fecha_nacimiento"];
$nacionalidad = $_REQUEST["nacionalidad"];

$consulta = "UPDATE autores SET nombre='$nombre_autor', fecha_nacimiento='$fecha_nacimiento', nacionalidad='$nacionalidad' WHERE autor_id='$autor_id'";

if (!$resultado = $mysqli->query($consulta)) {
    echo "Lo sentimos. La Aplicación no funciona<br>";
    echo "Error en la consulta: ".$consulta."<br>";
    echo "Num.error: ".$mysqli->errno."<br>";
    echo "Error: ".$mysqli->error. "<br>";
    exit;
} else {
    echo "Autor Modificado";
}
echo  "<br> <a href='../modificar.php'>Volver</a>"
?>
