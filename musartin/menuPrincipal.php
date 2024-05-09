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
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 20px auto auto;
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
        h2 {
            text-align: center;
            margin-left: 40px;
            margin-bottom: 20px;
            font-size: 20px;
        }

        a, .btn {
            display: block;
            margin: 20px auto;
            padding: 15px 20px;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        
        a:hover, .btn:hover {
            background-color: #45a049;
        }

        .btn-primary {
            background-color: #6bbf7e;
        }

        .btn-primary:hover {
            background-color: #5aa46d;
        }

        .btn-orange {
            background-color: #FFA500;
        }

        .btn-orange:hover {
            background-color: #cc8400;
        }

        .btn-blue {
            background-color: #007bff;
        }

        .btn-blue:hover {
            background-color: #0056b3;
        }

    </style>
</head>
<body>
<div class="container">
    <h1>Base de datos Musartin</h1>
    <h2>¿Qué desea hacer?</h2>
    <a href="autores.php" class="btn btn-orange">Información de Autores</a>
    <a href="salas.php" class="btn btn-orange">Información de Salas</a>
    <a href="cuadros.php" class="btn btn-orange">Información de Cuadros</a>
    <a href="cuadrosAutor.php" class="btn btn-blue">Cuadros de un autor</a>
    <a href="cuadrosSala.php" class="btn btn-blue">Cuadros de una sala</a>
    <a href="gestionarInfo.php" class="btn btn-primary">Gestionar Autores, Cuadros y Salas</a>
</div>
<form action="cerrarSesion.php" method="post">
    <button type="submit" class="btn btn-primary">Cerrar Sesión</button>
</form>
</body>
</html>