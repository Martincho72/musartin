<?php
require("./ConexionBBDD/SesionIniciada.php");
require("./ConexionBBDD/usarMusartin.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Búsqueda</title>
</head>
<body>
    <p>BUSCAR AUTOR</p>
    <form id="form_autor" name="form_autor" method="post" action="./Buscar/buscarAutor.php">
        <p>
            <label for="listado">Autor a buscar:</label>
            <select name="listado" size="1" id="listado_autor">
                <?php
                mysqli_report(MYSQLI_REPORT_ERROR);
                $consulta = "SELECT autor_id, nombre FROM autores;";
                $resultado = $mysqli->query($consulta);
                while ($fila = $resultado->fetch_assoc()) {
                    $n = $fila["nombre"];
                    echo ("<option value=" . $fila['autor_id'] . ">" . $n . "</option>");
                }
                ?>
            </select>
        </p>
        <input type="submit" name="enviar" id="enviar_autor" value="Buscar Autor" />
    </form>
    
    <p>BUSCAR CUADRO</p>
    <form id="form_cuadro" name="form_cuadro" method="post" action="./Buscar/buscarCuadro.php">
        <p>
            <label for="listado">Cuadro a buscar:</label>
            <select name="listado" size="1" id="listado_cuadro">
                <?php
                mysqli_report(MYSQLI_REPORT_ERROR);
                $consulta = "SELECT cuadro_id, titulo FROM cuadros;";
                $resultado = $mysqli->query($consulta);
                while ($fila = $resultado->fetch_assoc()) {
                    $n = $fila["titulo"];
                    echo ("<option value=" . $fila['cuadro_id'] . ">" . $n . "</option>");
                }
                ?>
            </select>
        </p>
        <input type="submit" name="enviar" id="enviar_cuadro" value="Buscar Cuadro" />
    </form>
    
    <p>BUSCAR SALA</p>
    <form id="form_sala" name="form_sala" method="post" action="./Buscar/buscarSala.php">
        <p>
            <label for="listado">Sala a buscar:</label>
            <select name="listado" size="1" id="listado_sala">
                <?php
                mysqli_report(MYSQLI_REPORT_ERROR);
                $consulta = "SELECT sala_id, nombre FROM salas;";
                $resultado = $mysqli->query($consulta);
                while ($fila = $resultado->fetch_assoc()) {
                    $n = $fila["nombre"];
                    echo ("<option value=" . $fila['sala_id'] . ">" . $n . "</option>");
                }
                ?>
            </select>
        </p>
        <input type="submit" name="enviar" id="enviar_sala" value="Buscar Sala" />
    </form>
</body>
</html>
