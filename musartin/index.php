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
    <h1>¡Bienvenido a Musartin!</h1>
    <a href="menu.php"><h2>Acceder a la base de datos</h2></a>
    <a href="CrearBorrar.php"><h2>Crear o Borrar base de datos</h2></a>
</body>
</html>