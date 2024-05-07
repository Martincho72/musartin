<?php
    require("./ConexionBBDD/SesionIniciada.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionar</title>
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
        h2 {
            text-align: center;
            margin-left: 40px;
            margin-bottom: 20px;
            font-size: 20px;
        }
        a {
            display: block;
            margin: 10px auto;
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-decoration: none;
        }
        a:hover {
            background-color: #2e7d32; /* Verde oscuro para el botón de insertar */
        }
        .btn-blue {
            background-color: #007bff;
        }
        .btn-orange {
            background-color: #FFA500;
        }
        .btn-red {
            background-color: #dc3545;
        }
        .btn-blue:hover {
            background-color: #0056b3; /* Azul oscuro para el botón de buscar */
        }
        .btn-orange:hover {
            background-color: #b37400; /* Naranja oscuro para el botón de modificar */
        }
        .btn-red:hover {
            background-color: #c82333; /* Rojo oscuro para el botón de eliminar */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>¿Qué desea hacer?</h1>
        <a href="insertar.php" class="btn-green"><h2>Insertar</h2></a>
        <a href="buscar.php" class="btn-blue"><h2>Buscar</h2></a>
        <a href="eliminar.php" class="btn-red"><h2>Eliminar</h2></a>
        <a href="modificar.php" class="btn-orange"><h2>Modificar</h2></a>
    </div>
</body>
</html>
