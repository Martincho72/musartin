<?php
require("./../ConexionBBDD/SesionIniciada.php");
require("./../ConexionBBDD/usarMusartin.php");

$cuadro_id = $_REQUEST["cuadro_id"];

$consulta = "DELETE FROM cuadros WHERE cuadro_id='$cuadro_id'";

if (!$resultado = $mysqli->query($consulta)) {
    echo "Lo sentimos. La Aplicación no funciona<br>";
    echo "Error en la consulta: ".$consulta."<br>";
    echo "Num.error: ".$mysqli->errno."<br>";
    echo "Error: ".$mysqli->error. "<br>";
    exit;
} else {
    echo "Cuadro Borrado";
}
echo  "<br> <a href='../eliminar.php'>Volver</a>"
?>