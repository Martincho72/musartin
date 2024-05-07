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
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Cuadro</title>
</head>
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 100px auto;
            padding: 20px;
            text-align: center;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }
        p {
            font-size: 24px;
            margin-bottom: 30px;
        }
        a {
            display: block;
            width: 80%;
            max-width: 300px;
            margin: 0 auto;
            padding: 15px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            transition: background-color 0.3s ease;
        }
        a:hover {
            background-color: #45a049;
        }
    </style>
<body>

<div class="container">
<h1>Insertar Cuadro</h1>
<?php
// Verificar si la sala especificada está llena
if (salaLlena($sala_id)) {
    // Verificar si el almacén (sala con id 1) también está lleno
    if (salaLlena(1)) {
        echo "<p> Lo sentimos, tanto la sala como el almacén están llenos. ❌ </p>";
    } else {
        // Insertar el cuadro en el almacén (sala con id 1)
        $sala_id = 1;
        $consulta_insertar_cuadro = "INSERT INTO cuadros (cuadro_id, titulo, fecha_creacion, tecnica, estilo, descripcion, autor_id, sala_id) VALUES
             (null, '$titulo_cuadro', '$fecha_creacion', '$tecnica', '$estilo', '$descripcion', '$autor_id', '$sala_id')";
        if (!$resultado_insertar_cuadro = $mysqli->query($consulta_insertar_cuadro)) {
            echo "<p> Error al insertar el cuadro en el almacén ❌ </p>";
            exit;
        } else {
            echo "<p> El cuadro se ha guaradado en el almacén ya que no había espacio para la sala seleccionada. 🏛 </p>";
        }
    }
} else {
    // Insertar el cuadro en la sala especificada
    $consulta_insertar_cuadro = "INSERT INTO cuadros (cuadro_id, titulo, fecha_creacion, tecnica, estilo, descripcion, autor_id, sala_id) VALUES
             (null, '$titulo_cuadro', '$fecha_creacion', '$tecnica', '$estilo', '$descripcion', '$autor_id', '$sala_id')";
    if (!$resultado_insertar_cuadro = $mysqli->query($consulta_insertar_cuadro)) {
        echo "<p> Error al insertar el cuadro en la sala ❌ </p>";
        exit;
    } else {
        echo "<p> Cuadro Insertado en la sala. ✅ </p>";
    }
}

echo "<br> <a href='../insertar.php'>Volver</a>";
?>
</div>
</body>
</html>