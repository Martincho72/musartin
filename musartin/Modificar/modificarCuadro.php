<?php
require("./../ConexionBBDD/SesionIniciada.php");
require("./../ConexionBBDD/usarMusartin.php");

$cuadro_id = $_REQUEST["cuadro_id"];
$titulo = $_REQUEST["titulo"];
$fecha_creacion = $_REQUEST["fecha_creacion"];
$tecnica = $_REQUEST["tecnica"];
$estilo = $_REQUEST["estilo"];
$descripcion = $_REQUEST["descripcion"];
$autor_id = $_REQUEST["autor_id"];
$sala_id = $_REQUEST["sala_id"];

$consulta_capacidad = "SELECT cuadros_actuales, maximo_cuadros FROM salas WHERE sala_id = '$sala_id'";

$resultado_capacidad = $mysqli->query($consulta_capacidad);

if (!$resultado_capacidad) {
    echo "Error al obtener la capacidad actual de la sala";
    exit;
} else {
    $fila_capacidad = $resultado_capacidad->fetch_assoc();

    $capacidad_actual = $fila_capacidad['cuadros_actuales'];
    $capacidad_maxima = $fila_capacidad['maximo_cuadros'];

    if ($capacidad_actual >= $capacidad_maxima) {
        echo "La sala está llena. No se puede mover el cuadro.";
    } else {
        $consulta = "UPDATE cuadros SET titulo='$titulo', fecha_creacion='$fecha_creacion', tecnica='$tecnica', estilo='$estilo', descripcion='$descripcion', autor_id='$autor_id', sala_id='$sala_id' WHERE cuadro_id='$cuadro_id'";

        if (!$resultado = $mysqli->query($consulta)) {
            echo "Lo sentimos. La Aplicación no funciona<br>";
            echo "Error en la consulta: ".$consulta."<br>";
            echo "Num.error: ".$mysqli->errno."<br>";
            echo "Error: ".$mysqli->error. "<br>";
            exit;
        } else {
            echo "Cuadro Modificado";
        }
    }
}
echo  "<br> <a href='../modificar.php'>Volver</a>";
?>