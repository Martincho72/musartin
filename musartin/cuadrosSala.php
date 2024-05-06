<?php
    require("./ConexionBBDD/SesionIniciada.php");
    require("./ConexionBBDD/usarMusartin.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Cuadros Sala</title>
</head>
<body>
<h1>Seleccione una sala</h1>
<p>&nbsp;</p>
<form id="form1" name="form1" method="post" action="mostrarCuadrosSala.php">
  
  <p>&nbsp;</p>
  <p>
    <label for="listado">Buscar cuadros de la sala:</label>
    <select name="listado" size="1" id="listado">
        <?php
        mysqli_report(MYSQLI_REPORT_ERROR);
        $consulta ="SELECT sala_id, nombre FROM salas ;";
        $resultado=$mysqli->query($consulta);
        while ($fila = $resultado ->fetch_assoc()){
            $n=$fila["nombre"];
            echo ("<option value=".$fila['sala_id'].">".$n."</option>");
        }
        ?>
    </select>
  </p>
  <input type="submit" name="enviar" id="enviar" value="Enviar" />

</form>
</body>
</html>