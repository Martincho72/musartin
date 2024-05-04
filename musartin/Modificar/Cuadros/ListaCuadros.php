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
<p>acceso a la BBDD para MODIFICAR CUADRO</p>
<p>&nbsp;</p>
<form id="form1" name="form1" method="post" action="InfoCuadro.php">
  
  <p>&nbsp;</p>
  <p>
    <label for="listado">Cuadro a modificar:</label>
    <select name="listado" size="1" id="listado">
    
    <?php
   mysqli_report(MYSQLI_REPORT_ERROR);
   $consulta ="SELECT cuadro_id, titulo FROM cuadros ;";
   $resultado=$mysqli->query($consulta);
    while ($fila = $resultado ->fetch_assoc()){
    $n=$fila["titulo"];
         echo ("<option value=".$fila['cuadro_id'].">".$n."</option>");}
    ?>
    </select>
  </p>
  <input type="submit" name="enviar" id="enviar" value="Enviar" />

</form>
</body>
</html>
