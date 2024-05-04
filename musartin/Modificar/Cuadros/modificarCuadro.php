<?php
require("./../../ConexionBBDD/SesionIniciada.php");
require("./../../ConexionBBDD/usarMusartin.php");

// Obtener los valores del formulario
$cuadro_id = $_REQUEST["cuadro_id"];
$titulo = $_REQUEST["titulo"];
$fecha_creacion = $_REQUEST["fecha_creacion"];
$tecnica = $_REQUEST["tecnica"];
$estilo = $_REQUEST["estilo"];
$descripcion = $_REQUEST["descripcion"];
$autor_id = $_REQUEST["autor_id"];
$sala_id = $_REQUEST["sala_id"];


// Construir la consulta SQL para modificar el cuadro
$consulta = "UPDATE cuadros SET titulo='$titulo', fecha_creacion='$fecha_creacion', tecnica='$tecnica', estilo='$estilo', descripcion='$descripcion', autor_id='$autor_id', sala_id='$sala_id' WHERE cuadro_id='$cuadro_id'";

// Ejecutar la consulta
if (!$resultado = $mysqli->query($consulta)) {
    echo "Lo sentimos. La Aplicación no funciona<br>";
    echo "Error en la consulta: ".$consulta."<br>";
    echo "Num.error: ".$mysqli->errno."<br>";
    echo "Error: ".$mysqli->error. "<br>";
    exit;
} else {
    echo "Cuadro Modificado";
}
echo  "<br> <a href='../../modificar.php'>Volver</a>"
?>
