<?php
    require("./ConexionBBDD/SesionIniciada.php");
    require("./ConexionBBDD/usarMusartin.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salas</title>
</head>
<body>
    <h1>Información de las salas</h1>
    <?php
$consulta = "SELECT * FROM salas";
$resultado = $mysqli->query($consulta);

if ($resultado->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Nombre</th><th>Ubicación</th><th>Cantidad máxima de cuadros</th><th>Cuadros Actuales</th></tr>";

    while ($fila = $resultado->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $fila['sala_id'] . "</td>";
        echo "<td>" . $fila['nombre'] . "</td>";
        echo "<td>" . $fila['ubicacion'] . "</td>";
        echo "<td>" . $fila['maximo_cuadros'] . "</td>";
        echo "<td>" . $fila['cuadros_actuales'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No se encontraron salas.";
}

$mysqli->close();
?>
</body>
</html>