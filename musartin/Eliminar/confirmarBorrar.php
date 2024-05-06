<?php
require("./../ConexionBBDD/SesionIniciada.php");
require("./../ConexionBBDD/usarMusartin.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmar Borrar</title>
</head>
<body>
<?php
if ($_REQUEST['opcion_eliminar'] == 'autor') {
    echo '<p>acceso a la BBDD para ELIMINAR AUTOR</p>
    <p>&nbsp;</p>
    <form id="form1" name="form1" method="post" action="InfoAutor.php">
      
      <p>&nbsp;</p>
      <p>
        <label for="listado">Autor a Eliminar:</label>
        <select name="listado" size="1" id="listado">';
        
    mysqli_report(MYSQLI_REPORT_ERROR);
    $consulta ="SELECT autor_id, nombre FROM autores ;";
    $resultado=$mysqli->query($consulta);
    while ($fila = $resultado ->fetch_assoc()){
        $n=$fila["nombre"];
        echo ("<option value=".$fila['autor_id'].">".$n."</option>");
    }
    
    echo '</select>
      </p>
      <input type="submit" name="enviar" id="enviar" value="Enviar" />
    
    </form>';
} elseif ($_REQUEST['opcion_eliminar'] == 'cuadro') {
    
    echo '<p>acceso a la BBDD para BORRAR CUADRO</p>
    <form id="form1" name="form1" method="post" action="InfoCuadro.php">
      
      <p>&nbsp;</p>
      <p>
        <label for="listado">Cuadro a Borrar:</label>
        <select name="listado" size="1" id="listado">';
        
    mysqli_report(MYSQLI_REPORT_ERROR);
    $consulta ="SELECT cuadro_id, titulo FROM cuadros ;";
    $resultado=$mysqli->query($consulta);
    while ($fila = $resultado ->fetch_assoc()){
        $n=$fila["titulo"];
        echo ("<option value=".$fila['cuadro_id'].">".$n."</option>");
    }
    
    echo '</select>
      </p>
      <input type="submit" name="enviar" id="enviar" value="Enviar" />
    
    </form>';
} elseif ($_REQUEST['opcion_eliminar'] == 'sala') {
    echo '<p>acceso a la BBDD para BORRAR SALA</p>
    <p>&nbsp;</p>
    <form id="form1" name="form1" method="post" action="InfoSala.php">
      
      <p>&nbsp;</p>
      <p>
        <label for="listado">Sala a modificar:</label>
        <select name="listado" size="1" id="listado">';
        
    mysqli_report(MYSQLI_REPORT_ERROR);
    $consulta ="SELECT sala_id, nombre FROM salas ;";
    $resultado=$mysqli->query($consulta);
    while ($fila = $resultado ->fetch_assoc()){
        $n=$fila["nombre"];
        echo ("<option value=".$fila['sala_id'].">".$n."</option>");
    }
    
    echo '</select>
      </p>
      <input type="submit" name="enviar" id="enviar" value="Enviar" />
    
    </form>';
}
?>
</body>
</html>