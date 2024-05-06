<?php
    require("./ConexionBBDD/SesionIniciada.php");
    require("./ConexionBBDD/usarMusartin.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autores</title>
</head>
<body>
    <h1>Información de los autores</h1>
    <?php
$consulta = "SELECT * FROM autores";
$resultado = $mysqli->query($consulta);

if ($resultado->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Nombre</th><th>Fecha Nacimiento</th><th>Nacionalidad</th></tr>";

    while ($fila = $resultado->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $fila['autor_id'] . "</td>";
        echo "<td>" . $fila['nombre'] . "</td>";
        echo "<td>" . $fila['fecha_nacimiento'] . "</td>";
        echo "<td>" . $fila['nacionalidad'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No se encontraron autores.";
}

$mysqli->close();
?>
</body>
</html>