<?php
require("./../../ConexionBBDD/SesionIniciada.php");
require("./../../ConexionBBDD/usarMusartin.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar por Autor</title>
</head>
<body>
<p>Buscar por Autor</p>
<form id="form1" name="form1" method="post" action="acciones_autor.php">
  
  <p>
    <label for="autor">Autor:</label>
    <select name="autor" id="autor">
        <?php
        // Consulta para obtener la lista de autores
        $consulta = "SELECT autor_id, nombre FROM autores";
        $resultado = $mysqli->query($consulta);
        
        // Genera las opciones del select con los autores
        while ($fila = $resultado->fetch_assoc()) {
            echo "<option value=\"{$fila['autor_id']}\">{$fila['nombre']}</option>";
        }
        ?>
    </select>
  </p>
  <p>
    <label for="accion">Acción:</label>
    <select name="accion" id="accion">
        <option value="mostrar_cuadros">Mostrar todos los cuadros del autor</option>
        <option value="total_cuadros">Mostrar el número de cuadros del autor</option>
        <option value="total_cuadros">Mostrar el número de cuadros del autor por cada estilo</option>
    </select>
  </p>
  <input type="submit" name="enviar" id="enviar" value="Enviar" />
</form>
</body>
</html>
