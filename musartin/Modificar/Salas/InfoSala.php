<?php
require("./../../ConexionBBDD/SesionIniciada.php");
require("./../../ConexionBBDD/usarMusartin.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Sala</title>
</head>
<body>
<form id="form1" name="form1" method="post" action="modificarSala.php">
  <p>FORMULARIO DE MODIFICACIÓN DE SALA</p>
  <p>
    <label for="sala_id">ID SALA:</label>
    <input type="text" name="sala_id" id="sala_id" readonly="readonly"
    value="<?php echo $_REQUEST['listado']; ?>" />
  </p>
   <?php

    $cod=$_REQUEST['listado'];
     $consulta="SELECT * FROM salas WHERE sala_id='$cod';";

    if (!@$resultado= $mysqli->query($consulta)) 
    /* false fallo query, true si ok */
    {
       echo "Lo sentinmos. Aplicación no funciona<br>"   ;
       echo "error en la consulta $consulta <br>";
       echo "Num.error: ".$mysqli->errno."<br>";
       echo "Error: ".$mysqli->error."<br>";
       exit;
    }
    while ($fila=$resultado->fetch_assoc())
    {  
     echo "<p><label for='nombre'>Nombre</label>
    <input type='text' name='nombre' id='nombre'
    value='".$fila['nombre']."' />
     </p>";

    echo "<p><label for='ubicacion'>Ubicacion</label>
    <input type='text' name='ubicacion' id='ubicacion'
    value='".$fila['ubicacion']."' />
     </p>";     

     echo "<p><label for='maximo_cuadros'>Capacidad Máxima</label>
    <input type='number' name='maximo_cuadros' id='maximo_cuadros'
    value='".$fila['maximo_cuadros']."' />
     </p>";
    }
  ?>

  <p>
    <input type="submit" name="enviar" id="enciar" value="Modificar Sala" />
    <input type="reset" name="borrar" id="borrar" value="Restablecer" />
  </p>
</form>
</body>
</html>