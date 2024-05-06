<?php
require("./../ConexionBBDD/SesionIniciada.php");
require("./../ConexionBBDD/usarMusartin.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Búsqueda Sala</title>
</head>
<body>
<h1>Resultado Búsqueda</h1>
<?php
if(isset($_REQUEST['listado'])){
    $sala_id = $_REQUEST['listado'];

    $consulta  = "SELECT * FROM salas WHERE sala_id = $sala_id";
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
}
    $mysqli->close();
?>
</body>
</html>