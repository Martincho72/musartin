<?php
require("./../../ConexionBBDD/SesionIniciada.php");
require("./../../ConexionBBDD/usarMusartin.php");

// Obtener los valores del formulario
$autor_id = $_REQUEST["autor_id"];
$nombre_autor = $_REQUEST["nombre"];
$fecha_nacimiento = $_REQUEST["fecha_nacimiento"];
$nacionalidad = $_REQUEST["nacionalidad"];

// Construir la consulta SQL para modificar el autor
$consulta = "UPDATE autores SET nombre='$nombre_autor', fecha_nacimiento='$fecha_nacimiento', nacionalidad='$nacionalidad' WHERE autor_id='$autor_id'";

// Ejecutar la consulta
if (!$resultado = $mysqli->query($consulta)) {
    echo "Lo sentimos. La Aplicación no funciona<br>";
    echo "Error en la consulta: ".$consulta."<br>";
    echo "Num.error: ".$mysqli->errno."<br>";
    echo "Error: ".$mysqli->error. "<br>";
    exit;
} else {
    echo "Autor Modificado";
}
echo  "<br> <a href='../../modificar.php'>Volver</a>"
?>
