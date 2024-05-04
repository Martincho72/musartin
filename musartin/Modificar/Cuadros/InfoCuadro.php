<?php
require("./../../ConexionBBDD/SesionIniciada.php");
require("./../../ConexionBBDD/usarMusartin.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Cuadro</title>
</head>
<body>
<form id="form1" name="form1" method="post" action="modificarCuadro.php">
  <p>FORMULARIO DE MODIFICACIÓN DE CUADRO</p>
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
    <input type='text' name='titulo' id='titulo'
    value='".$fila['titulo']."' />
     </p>";

    echo "<p><label for='fecha_creacion'>Año de creación:</label>
    <input type='number' name='fecha_creacion' id='fecha_creacion'
    value='".$fila['fecha_creacion']."' />
     </p>";     

     echo "<p><label for='tecnica'>Técnica:</label>
    <input type='text' name='tecnica' id='tecnica'
    value='".$fila['tecnica']."' />
     </p>";

     echo "<p><label for='estilo'>Estilo:</label>
    <input type='text' name='estilo' id='estilo'
    value='".$fila['estilo']."' />
     </p>";

     echo "<p><label for='descripcion'>Descripción:</label>
    <input type='text' name='descripcion' id='descripcion'
    value='".$fila['descripcion']."' />
     </p>";

     echo "<p> <label for='autor_id'>Autor:</label>";
    echo "<select name='autor_id' size='1' id='autor_id'>";
    $prov=$fila['autor_id'];
    $consulta2 ="SELECT autor_id, nombre FROM autores;";
    $resultado2=$mysqli->query($consulta2);
    while ($fila2 = $resultado2 ->fetch_assoc()){
          $n=$fila2["nombre"];
         if ($prov==$fila2['autor_id']) echo "<option value=".$fila2['autor_id']." selected='selected'>".$n."</option>";
         else
           echo "<option value=".$fila2['autor_id'].">".$n."
         </option>";
       }
    echo "</select> </p>";

    echo "<p> <label for='sala_id'>Sala:</label>";
    echo "<select name='sala_id' size='1' id='sala_id'>";
    $prov=$fila['sala_id'];
    $consulta2 ="SELECT sala_id, nombre FROM salas;";
    $resultado2=$mysqli->query($consulta2);
    while ($fila2 = $resultado2 ->fetch_assoc()){
          $n=$fila2["nombre"];
         if ($prov==$fila2['sala_id']) echo "<option value=".$fila2['sala_id']." selected='selected'>".$n."</option>";
         else
           echo "<option value=".$fila2['sala_id'].">".$n."
         </option>";
       }
    echo "</select> </p>";
    }
  ?>

  <p>
    <input type="submit" name="enviar" id="enciar" value="Modificar Cuadro" />
    <input type="reset" name="borrar" id="borrar" value="Restablecer" />
  </p>
</form>
</body>
</html>