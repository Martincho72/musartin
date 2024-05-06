<?php
require("./ConexionBBDD/SesionIniciada.php");
require("./ConexionBBDD/usarMusartin.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuadros del Autor</title>
</head>
<body>
<?php
if(isset($_REQUEST['listado'])){
    $autor_id = $_REQUEST['listado'];

    $consulta_cuadros = "SELECT * FROM cuadros WHERE autor_id = $autor_id";
    $resultado_cuadros = $mysqli->query($consulta_cuadros);

    if ($resultado_cuadros->num_rows > 0) {
        echo "<h1>Cuadros del Autor</h1>";
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Título</th><th>Fecha de Creación</th><th>Técnica</th><th>Estilo</th><th>Descripción</th><th>Autor ID</th><th>Sala ID</th></tr>";

        while ($fila_cuadros = $resultado_cuadros->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $fila_cuadros['cuadro_id'] . "</td>";
            echo "<td>" . $fila_cuadros['titulo'] . "</td>";
            echo "<td>" . $fila_cuadros['fecha_creacion'] . "</td>";
            echo "<td>" . $fila_cuadros['tecnica'] . "</td>";
            echo "<td>" . $fila_cuadros['estilo'] . "</td>";
            echo "<td>" . $fila_cuadros['descripcion'] . "</td>";
            echo "<td>" . $fila_cuadros['autor_id'] . "</td>";
            echo "<td>" . $fila_cuadros['sala_id'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No se encontraron cuadros para este autor.";
    }
}
?>
</body>
</html>
