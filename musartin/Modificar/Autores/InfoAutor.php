<?php
require("./../../ConexionBBDD/SesionIniciada.php");
require("./../../ConexionBBDD/usarMusartin.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Autor</title>
</head>
<body>
<form id="form1" name="form1" method="post" action="modificarAutor.php">
  <p>FORMULARIO DE MODIFICACIÓN DE AUTOR</p>
  <p>
    <label for="autor_id">ID AUTOR:</label>
    <input type="text" name="autor_id" id="autor_id" readonly="readonly"
    value="<?php echo $_REQUEST['listado']; ?>" />
  </p>
   <?php

    $cod=$_REQUEST['listado'];
     $consulta="SELECT * FROM autores WHERE autor_id='$cod';";

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

    echo "<p><label for='fecha_nacimiento'>Fecha Nacimiento</label>
    <input type='date' name='fecha_nacimiento' id='fecha_nacimiento'
    value='".$fila['fecha_nacimiento']."' />
     </p>";     

     echo "<p><label for='nacionalidad'>Nacionalidad</label>
    <input type='text' name='nacionalidad' id='nacionalidad'
    value='".$fila['nacionalidad']."' />
     </p>";
    }
  ?>

  <p>
    <input type="submit" name="enviar" id="enciar" value="Modificar Autor" />
    <input type="reset" name="borrar" id="borrar" value="Restablecer" />
  </p>
</form>
</body>
</html>