<?php
require("./../ConexionBBDD/SesionIniciada.php");
require("./../ConexionBBDD/usarMusartin.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Cuadro</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 100px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        form {
            text-align: center;
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        input[type="text"],
        input[type="number"],
        input[type="date"],
        select {
            width: calc(100% - 20px);
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            margin-bottom: 20px;
        }
        input[type="submit"],
        input[type="reset"] {
            width: calc(50% - 10px);
            padding: 15px;
            background-color: #4CAF50;
            border: none;
            color: white;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover,
        input[type="reset"]:hover {
            background-color: #45a049;
        }
        #sala_id_antiguo{
          display:none;
        }
    </style>
</head>
<body>
<div class="container">
<form id="form1" name="form1" method="post" action="modificarCuadro.php">
  <h1>FORMULARIO MODIFICAR CUADRO</h1>
    <label for="cuadro_id">ID CUADRO:</label>
    <input type="text" name="cuadro_id" id="cuadro_id" readonly="readonly"
    value="<?php echo $_REQUEST['listado']; ?>" />
  </p>
   <?php

    $cod=$_REQUEST['listado'];
     $consulta="SELECT * FROM cuadros WHERE cuadro_id='$cod';";

    if (!@$resultado= $mysqli->query($consulta)) 
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
    /*Este label no se muestra, está para luego comprobar si el ID de la sala ha cambiado*/ 
    echo "<p><label for='sala_id_antiguo'></label>
    <input type='text' name='sala_id_antiguo' id='sala_id_antiguo' readonly='readonly'
    value='".$prov."' />
     </p>";
  ?>
    <input type="submit" name="enviar" id="enviar" value="Modificar Cuadro" />
    <input type="reset" name="borrar" id="borrar" value="Restablecer" />
  </form>
</div>
</body>
</html>