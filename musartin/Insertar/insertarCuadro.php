<?php
require("./ConexionBBDD/SesionIniciada.php");
// Requerir el archivo de conexión a la base de datos
require("./../ConexionBBDD/usarMusartin.php");

// Obtener los valores del formulario
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

// Construir la consulta SQL para insertar el cuadro
$consulta = "INSERT INTO cuadros (cuadro_id, titulo, fecha_creacion, tecnica, estilo, descripcion, autor_id, sala_id) VALUES
             (null, '$titulo_cuadro', '$fecha_creacion', '$tecnica', '$estilo', '$descripcion', '$autor_id', '$sala_id');";

// Ejecutar la consulta
if (!$resultado = $mysqli->query($consulta)) {
    echo "Lo sentimos. La Aplicación no funciona<br>";
    echo "Error en la consulta: ".$consulta."<br>";
    echo "Num.error: ".$mysqli->errno."<br>";
    echo "Error: ".$mysqli->error. "<br>";
    exit;
} else {
    echo "Cuadro Insertado";
}
echo "<br> <a href='../insertar.php'>Volver</a>";
?>
