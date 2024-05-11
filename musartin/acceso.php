<?php
    require("./ConexionBBDD/SesionIniciada.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 700px;
            margin: 20px auto;
            padding: 20px;
            text-align: center;
        }
        h1 {
            font-size: 80px;
            text-align: center;
            margin-bottom: 40px;
            color: #333;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        .button {
            display: block;
            width: 80%;
            max-width: 300px;
            margin: 0 auto 20px;
            padding: 15px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            transition: background-color 0.3s ease;
        }
        .button:hover {
            background-color: #45a049;
        }
        .crear:hover {
            background-color: blue;
        }
        .borrar:hover {
            background-color: red;
        }
    </style>
</head>
<body>
    <h1>MENÚ PRINCIPAL</h1>
    <h2>¡Bienvenido a Musartin!</h2>
    <div class="container">
        <a href="./ConexionBBDD/existeBBDD.php" class="button acceder">Acceder a la base de datos</a>
        <a href="./Demo/CrearBD.php" class="button crear">Crear la base de datos (+ datos demo)</a>
        <a href="./Demo/BorrarBD.php" class="button borrar">Borrar la base de datos</a>
    </div>
</body>
</html>