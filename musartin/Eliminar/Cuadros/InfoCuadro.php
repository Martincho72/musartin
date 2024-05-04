<?php
require("./../../ConexionBBDD/SesionIniciada.php");
require("./../../ConexionBBDD/usarMusartin.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrar Cuadro</title>
</head>
<body>
<form id="form1" name="form1" method="post" action="EliminarCuadro.php">
  <p>FORMULARIO DE BORRADO DE CUADRO</p>
  <p>
    <label for="cuadro_id">ID CUADRO:</label>
    <input type="text" name="cuadro_id" id="cuadro_id" readonly="readonly"
    value="<?php echo $_REQUEST['listado']; ?>" />
  </p>
   <?php

    $cod=$_REQUEST['listado'];
     $consulta="SELECT * FROM cuadros WHERE cuadro_id='$cod';";

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
     echo "<p><label for='titulo'>Título:</label>
    <input type='text' name='titulo' id='titulo' readonly='readonly'
    value='".$fila['titulo']."' />
     </p>";

    echo "<p><label for='fecha_creacion'>Año de creación:</label>
    <input type='number' name='fecha_creacion' id='fecha_creacion' readonly='readonly'
    value='".$fila['fecha_creacion']."' />
     </p>";     

     echo "<p><label for='tecnica'>Técnica:</label>
    <input type='text' name='tecnica' id='tecnica' readonly='readonly'
    value='".$fila['tecnica']."' />
     </p>";

     echo "<p><label for='estilo'>Estilo:</label>
    <input type='text' name='estilo' id='estilo' readonly='readonly'
    value='".$fila['estilo']."' />
     </p>";

     echo "<p><label for='descripcion'>Descripción:</label>
    <input type='text' name='descripcion' id='descripcion' readonly='readonly'
    value='".$fila['descripcion']."' />
     </p>";

     echo "<p><label for='autor_id'>Autor:</label>";
        $consulta2 = "SELECT nombre FROM autores WHERE autor_id = " . $fila['autor_id'];
        $resultado2 = $mysqli->query($consulta2);
    $fila2 = $resultado2->fetch_assoc();
    echo "<input type='text' id='autor_id' name='autor_id' value='".$fila2['nombre']."' readonly>";
    echo "</p>";

    echo "<p><label for='sala_id'>Sala:</label>";
        $consulta3 = "SELECT nombre FROM salas WHERE sala_id = " . $fila['sala_id'];
        $resultado3 = $mysqli->query($consulta3);
    $fila3 = $resultado3->fetch_assoc();
    echo "<input type='text' id='autor_id' name='autor_id' value='".$fila3['nombre']."' readonly>";
    echo "</p>";
    }
  ?>

  <p>
    <input type="submit" name="enviar" id="enciar" value="Borrar Cuadro" />
    <input type="reset" name="borrar" id="borrar" value="Restablecer" />
  </p>
</form>
</body>
</html>