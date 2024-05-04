<?php
    require("./ConexionBBDD/SesionIniciada.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Musartin - Base De Datos</title>
    <style>
        h1{
            text-align: center;
        }
        h2{
            text-align: center;
            margin-left: 40px;
        }
    </style>
</head>
<body>
    <h1>¿Qué acción desea realizar?</h1>
    <a href="./Demo/CrearBD.php"><h2>Crear la base de datos (+ datos demo)</h2></a>
    <a href="./Demo/BorrarBD.php"><h2>Borrar la base de datos</h2></a>
    <a href="index.php"><h2>Inicio</h2></a>
</body>
</html>