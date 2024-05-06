<?php
require("./../ConexionBBDD/SesionIniciada.php");
require("./../ConexionBBDD/usarMusartin.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Búsqueda Cuadro</title>
</head>
<body>
<h1>Resultado Búsqueda</h1>
<?php

if(isset($_REQUEST['listado'])){
    $cuadro_id = $_REQUEST['listado'];

    $consulta  = "SELECT cuadros.*, autores.nombre AS nombre_autor, salas.nombre AS nombre_sala FROM cuadros
                  LEFT JOIN autores ON cuadros.autor_id = autores.autor_id
                  LEFT JOIN salas ON cuadros.sala_id = salas.sala_id
                  WHERE cuadro_id = $cuadro_id";
    $resultado = $mysqli->query($consulta);

    if ($resultado->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Título</th><th>Fecha de Creación</th><th>Técnica</th><th>Estilo</th><th>Descripción</th><th>Autor</th><th>Sala</th></tr>";

        while ($fila = $resultado->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $fila['cuadro_id'] . "</td>";
            echo "<td>" . $fila['titulo'] . "</td>";
            echo "<td>" . $fila['fecha_creacion'] . "</td>";
            echo "<td>" . $fila['tecnica'] . "</td>";
            echo "<td>" . $fila['estilo'] . "</td>";
            echo "<td>" . $fila['descripcion'] . "</td>";
            echo "<td>" . $fila['nombre_autor'] . " (ID: " . $fila['autor_id'] . ")</td>";
            echo "<td>" . $fila['nombre_sala'] . " (ID: " . $fila['sala_id'] . ")</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No se encontró el cuadro con el ID: $cuadro_id.";
    }
}
$mysqli->close();
?>
</body>
</html>