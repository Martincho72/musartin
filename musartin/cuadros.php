<?php
require("./ConexionBBDD/SesionIniciada.php");
require("./ConexionBBDD/usarMusartin.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuadros</title>
</head>
<body>
    <h1>Información de los cuadros</h1>
    <?php
    $consulta = "SELECT cuadros.*, autores.nombre AS nombre_autor, salas.nombre AS nombre_sala FROM cuadros
                 LEFT JOIN autores ON cuadros.autor_id = autores.autor_id
                 LEFT JOIN salas ON cuadros.sala_id = salas.sala_id";
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
        echo "No se encontraron cuadros.";
    }
    $mysqli->close();
    ?>
</body>
</html>