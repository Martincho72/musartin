<?php
require("./../ConexionBBDD/SesionIniciada.php");
require("./../ConexionBBDD/usarMusartin.php");
$sala_id = $_REQUEST["sala_id"];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Sala</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 700px;
            margin: 100px auto;
            padding: 20px;
            text-align: center;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }
        p {
            font-size: 24px;
            margin-bottom: 30px;
        }
        a {
            display: block;
            width: 80%;
            max-width: 300px;
            margin: 0 auto;
            padding: 15px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            transition: background-color 0.3s ease;
        }
        a:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<div class="container">
    <?php
    // Actualizar la sala_id de los cuadros asociados a la sala que se va a eliminar
$consulta_actualizar_cuadros = "UPDATE cuadros SET sala_id = 1 WHERE sala_id='$sala_id'";
if (!$resultado_actualizar_cuadros = $mysqli->query($consulta_actualizar_cuadros)) {
    echo "Lo sentimos. La Aplicación no funciona<br>";
    echo "Error en la consulta de actualización de cuadros: ".$consulta_actualizar_cuadros."<br>";
    echo "Num.error: ".$mysqli->errno."<br>";
    echo "Error: ".$mysqli->error. "<br>";
    exit;
}

if($sala_id != 1){
$consulta_eliminar_sala = "DELETE FROM salas WHERE sala_id='$sala_id'";
if (!$resultado_eliminar_sala = $mysqli->query($consulta_eliminar_sala)) {
    echo "Lo sentimos. La Aplicación no funciona<br>";
    echo "Error en la consulta de eliminación de sala: ".$consulta_eliminar_sala."<br>";
    echo "Num.error: ".$mysqli->errno."<br>";
    echo "Error: ".$mysqli->error. "<br>";
    exit;
}

echo "<h1> Sala eliminada correctamente ✅ </h1>";
} else{
    echo "<h1> Por favor, no intente borrar </h1>";
    echo "<h1> El Almacén / Sala Principal ❌</h1>";
}
echo  "<br> <a href='../eliminar.php'>Volver</a>";
    ?>
</div>
</body>
</html>