<?php
    require("./ConexionBBDD/SesionIniciada.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú Principal</title>
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
    <a href="autores.php"><h2>Información de Autores</h2></a>
    <a href="salas.php"><h2>Información de Salas</h2></a>
    <a href="cuadros.php"><h2>Información de Cuadros</h2></a>
    <a href="cuadrosAutor.php"><h2>Cuadros de un autor</h2></a>
    <a href="cuadrosSala.php"><h2>Cuadros de una sala</h2></a>
    <a href="gestionarInfo.php"><h2>Gestionar Autores, Cuadros y Salas</h2></a>
    <a href="cerrarSesion.php"><h2>Cerrar Sesión</h2></a>
</body>
</html>