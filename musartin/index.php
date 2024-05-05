<?php
    require("./ConexionBBDD/SesionIniciada.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Musartin - Inicio</title>
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
    <h1>¿Qué desea hacer?</h1>
    <a href="insertar.php"><h2>Insertar</h2></a>
    <a href="buscar.php"><h2>Buscar</h2></a>
    <a href="eliminar.php"><h2>Eliminar</h2></a>
    <a href="modificar.php"><h2>Modificar</h2></a>
</body>
</html>