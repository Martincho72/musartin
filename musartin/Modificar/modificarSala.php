<?php
require("./../ConexionBBDD/SesionIniciada.php");
require("./../ConexionBBDD/usarMusartin.php");
$sala_id = $_REQUEST["sala_id"];
$nombre_sala = $_REQUEST["nombre"];
$ubicacion = $_REQUEST["ubicacion"];
$capacidad = $_REQUEST["maximo_cuadros"];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Sala</title>
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
        .boton {
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
        .boton:hover {
            background-color: #45a049;
        }
        .atras{
            position: absolute;
            top:1%;
            left:1%;
        }
        .home{
            position: absolute;
            top:1%;
            right:1%;
        }
        .atras img{
            height:64px;
            width: 64px;
        }
        .home img{
            height:64px;
            width: 64px;
        }
    </style>
</head>
<body>
    <a href="../modificar.php"><div class="atras"><img src="../img/atras.png" alt="atrás"></div></a>
    <a href="../menuPrincipal.php"><div class="home"><img src="../img/home.png" alt="inicio"></div></a>
    <div class="container">
        <?php
    $consulta_capacidad = "SELECT cuadros_actuales FROM salas WHERE sala_id = '$sala_id'";

$resultado_capacidad = $mysqli->query($consulta_capacidad);

if (!$resultado_capacidad) {
    echo "Error al obtener la capacidad actual de la sala";
    exit;
} else {
    $fila_capacidad = $resultado_capacidad->fetch_assoc();

    $capacidad_actual = $fila_capacidad['cuadros_actuales'];

    if ($capacidad < $capacidad_actual) {
        echo "<h1> No se puede modificar la sala porque la nueva capacidad máxima de cuadros es menor que la cantidad de cuadros que hay en la sala. </h1>";
    } else {
        $consulta = "UPDATE salas SET nombre='$nombre_sala', ubicacion='$ubicacion', maximo_cuadros='$capacidad' WHERE sala_id='$sala_id'";

        if (!$resultado = $mysqli->query($consulta)) {
            echo "Lo sentimos. La Aplicación no funciona<br>";
            echo "Error en la consulta: ".$consulta."<br>";
            echo "Num.error: ".$mysqli->errno."<br>";
            echo "Error: ".$mysqli->error. "<br>";
            exit;
        } else {
            echo "<h1> Sala Modificada </h1>";
        }
    }
}

echo  "<a href=../modificar.php class=boton>Volver</a>"
?>
</div>
</body>
</html>