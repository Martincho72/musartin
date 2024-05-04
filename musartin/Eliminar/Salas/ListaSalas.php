<?php
require("./../../ConexionBBDD/SesionIniciada.php");
require("./../../ConexionBBDD/usarMusartin.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<p>acceso a la BBDD para BORRAR SALA</p>
<p>&nbsp;</p>
<form id="form1" name="form1" method="post" action="InfoSala.php">
  
  <p>&nbsp;</p>
  <p>
    <label for="listado">Sala a modificar:</label>
    <select name="listado" size="1" id="listado">
    
    <?php
   mysqli_report(MYSQLI_REPORT_ERROR);
   $consulta ="SELECT sala_id, nombre FROM salas ;";
   $resultado=$mysqli->query($consulta);
    while ($fila = $resultado ->fetch_assoc()){
    $n=$fila["nombre"];
         echo ("<option value=".$fila['sala_id'].">".$n."</option>");}
    ?>
    </select>
  </p>
  <input type="submit" name="enviar" id="enviar" value="Enviar" />

</form>
</body>
</html>
