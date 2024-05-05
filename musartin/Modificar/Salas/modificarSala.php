<?php
require("./../../ConexionBBDD/SesionIniciada.php");
require("./../../ConexionBBDD/usarMusartin.php");

// Obtener los valores del formulario
$sala_id = $_REQUEST["sala_id"];
$nombre_sala = $_REQUEST["nombre"];
$ubicacion = $_REQUEST["ubicacion"];
$capacidad = $_REQUEST["maximo_cuadros"];

// Construir la consulta SQL para obtener la capacidad actual de la sala
$consulta_capacidad = "SELECT cuadros_actuales FROM salas WHERE sala_id = '$sala_id'";

// Ejecutar la consulta para obtener la capacidad actual de la sala
$resultado_capacidad = $mysqli->query($consulta_capacidad);

// Verificar si se pudo obtener la capacidad actual de la sala
if (!$resultado_capacidad) {
    echo "Error al obtener la capacidad actual de la sala";
    exit;
} else {
    // Obtener la fila de resultados
    $fila_capacidad = $resultado_capacidad->fetch_assoc();

    // Obtener la capacidad actual de la sala
    $capacidad_actual = $fila_capacidad['cuadros_actuales'];

    // Verificar si la nueva capacidad máxima es menor que la capacidad actual
    if ($capacidad < $capacidad_actual) {
        echo "No se puede modificar la sala porque la nueva capacidad máxima de cuadros es menor que la capacidad actual de la sala.";
    } else {
        // Construir la consulta SQL para modificar la sala
        $consulta = "UPDATE salas SET nombre='$nombre_sala', ubicacion='$ubicacion', maximo_cuadros='$capacidad' WHERE sala_id='$sala_id'";

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
    }
}

echo  "<br> <a href='../../modificar.php'>Volver</a>"
?>
