<?php
require("./../../ConexionBBDD/SesionIniciada.php");
require("./../../ConexionBBDD/usarMusartin.php");

// Obtener los valores del formulario
$sala_id = $_REQUEST["sala_id"];
$nombre_sala = $_REQUEST["nombre"];
$ubicacion = $_REQUEST["ubicacion"];
$capacidad = $_REQUEST["capacidad"];

// Construir la consulta SQL para modificar la sala
$consulta = "UPDATE salas SET nombre='$nombre_sala', ubicacion='$ubicacion', capacidad='$capacidad' WHERE sala_id='$sala_id'";

// Ejecutar la consulta
if (!$resultado = $mysqli->query($consulta)) {
    echo "Lo sentimos. La Aplicación no funciona<br>";
    echo "Error en la consulta: ".$consulta."<br>";
    echo "Num.error: ".$mysqli->errno."<br>";
    echo "Error: ".$mysqli->error. "<br>";
    exit;
} else {
    echo "Sala Modificada";
}
echo  "<br> <a href='../../modificar.php'>Volver</a>"
?>
