<?php
require("./../ConexionBBDD/SesionIniciada.php");
require("./../ConexionBBDD/usarMusartin.php");

$autor_id = $_REQUEST["autor_id"];

$consulta = "DELETE FROM autores WHERE autor_id='$autor_id'";

if (!$resultado = $mysqli->query($consulta)) {
    echo "Lo sentimos. La Aplicación no funciona<br>";
    echo "Error en la consulta: ".$consulta."<br>";
    echo "Num.error: ".$mysqli->errno."<br>";
    echo "Error: ".$mysqli->error. "<br>";
    exit;
} else {
    echo "Autor Borrado";
}
echo  "<br> <a href='../eliminar.php'>Volver</a>"
?>