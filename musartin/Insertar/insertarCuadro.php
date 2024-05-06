<?php
require("./../ConexionBBDD/SesionIniciada.php");
require("./../ConexionBBDD/usarMusartin.php");

$titulo_cuadro = $_REQUEST["titulo_cuadro"];
$fecha_creacion = $_REQUEST["fecha_creacion"];
$tecnica = $_REQUEST["tecnica"];
$estilo = $_REQUEST["estilo"];
$descripcion = $_REQUEST["descripcion"];
$autor_id = $_REQUEST["autor_id"];
$sala_id = $_REQUEST["sala_id"];

// Escapar caracteres especiales para evitar inyección SQL
$titulo_cuadro = $mysqli->real_escape_string($titulo_cuadro);
$tecnica = $mysqli->real_escape_string($tecnica);
$estilo = $mysqli->real_escape_string($estilo);
$descripcion = $mysqli->real_escape_string($descripcion);

// Función para verificar si una sala está llena
function salaLlena($sala_id) {
    global $mysqli;
    $consulta_capacidad = "SELECT cuadros_actuales, maximo_cuadros FROM salas WHERE sala_id = $sala_id";
    $resultado_capacidad = $mysqli->query($consulta_capacidad);
    if (!$resultado_capacidad) {
        echo "Error al obtener la capacidad de la sala";
        exit;
    }
    $fila_capacidad = $resultado_capacidad->fetch_assoc();
    $capacidad_actual = $fila_capacidad['cuadros_actuales'];
    $capacidad_maxima = $fila_capacidad['maximo_cuadros'];
    return $capacidad_actual >= $capacidad_maxima;
}

// Verificar si la sala especificada está llena
if (salaLlena($sala_id)) {
    // Verificar si el almacén (sala con id 1) también está lleno
    if (salaLlena(1)) {
        echo "Lo sentimos, tanto la sala como el almacén están llenos.";
    } else {
        // Insertar el cuadro en el almacén (sala con id 1)
        $sala_id = 1;
        $consulta_insertar_cuadro = "INSERT INTO cuadros (cuadro_id, titulo, fecha_creacion, tecnica, estilo, descripcion, autor_id, sala_id) VALUES
             (null, '$titulo_cuadro', '$fecha_creacion', '$tecnica', '$estilo', '$descripcion', '$autor_id', '$sala_id')";
        if (!$resultado_insertar_cuadro = $mysqli->query($consulta_insertar_cuadro)) {
            echo "Error al insertar el cuadro en el almacén";
            exit;
        } else {
            echo "El cuadro se ha guaradado en el almacén ya que no había espacio para la sala seleccionada.";
        }
    }
} else {
    // Insertar el cuadro en la sala especificada
    $consulta_insertar_cuadro = "INSERT INTO cuadros (cuadro_id, titulo, fecha_creacion, tecnica, estilo, descripcion, autor_id, sala_id) VALUES
             (null, '$titulo_cuadro', '$fecha_creacion', '$tecnica', '$estilo', '$descripcion', '$autor_id', '$sala_id')";
    if (!$resultado_insertar_cuadro = $mysqli->query($consulta_insertar_cuadro)) {
        echo "Error al insertar el cuadro en la sala";
        exit;
    } else {
        echo "Cuadro Insertado en la sala.";
    }
}

echo "<br> <a href='../insertar.php'>Volver</a>";
?>