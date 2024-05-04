<?php
require("./../../ConexionBBDD/SesionIniciada.php");
require("./../../ConexionBBDD/usarMusartin.php");

// Obtener los valores del formulario
$autor_id = $_REQUEST["autor_id"];

// Construir la consulta SQL para borrar el autor
$consulta = "DELETE FROM autores WHERE autor_id='$autor_id'";

// Ejecutar la consulta
if (!$resultado = $mysqli->query($consulta)) {
    echo "Lo sentimos. La Aplicación no funciona<br>";
    echo "Error en la consulta: ".$consulta."<br>";
    echo "Num.error: ".$mysqli->errno."<br>";
    echo "Error: ".$mysqli->error. "<br>";
    exit;
} else {
    echo "Autor Borrado";
}
echo  "<br> <a href='../../eliminar.php'>Volver</a>"
?>
