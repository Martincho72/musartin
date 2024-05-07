<?php
require("./../ConexionBBDD/SesionIniciada.php");
require("./../ConexionBBDD/usarMusartin.php");

$sala_id = $_REQUEST["sala_id"];
$nombre_sala = $_REQUEST["nombre"];
$ubicacion = $_REQUEST["ubicacion"];
$capacidad = $_REQUEST["maximo_cuadros"];

$consulta_capacidad = "SELECT cuadros_actuales FROM salas WHERE sala_id = '$sala_id'";

$resultado_capacidad = $mysqli->query($consulta_capacidad);

if (!$resultado_capacidad) {
    echo "Error al obtener la capacidad actual de la sala";
    exit;
} else {
    $fila_capacidad = $resultado_capacidad->fetch_assoc();

    $capacidad_actual = $fila_capacidad['cuadros_actuales'];

    if ($capacidad < $capacidad_actual) {
        echo "No se puede modificar la sala porque la nueva capacidad máxima de cuadros es menor que la capacidad actual de la sala.";
    } else {
        $consulta = "UPDATE salas SET nombre='$nombre_sala', ubicacion='$ubicacion', maximo_cuadros='$capacidad' WHERE sala_id='$sala_id'";

        if (!$resultado = $mysqli->query($consulta)) {
            echo "Lo sentimos. La Aplicación no funciona<br>";
            echo "Error en la consulta: ".$consulta."<br>";
            echo "Num.error: ".$mysqli->errno."<br>";
            echo "Error: ".$mysqli->error. "<br>";
            exit;
        } else {
            echo "Sala Modificada";
        }
    }
}

echo  "<br> <a href='../modificar.php'>Volver</a>"
?>
