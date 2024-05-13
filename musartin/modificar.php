<?php
    require("./ConexionBBDD/SesionIniciada.php");
    require("./ConexionBBDD/existeBBDD.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        h1 {
            text-align: center;
            margin-top: 50px;
            color: #333;
        }
        .opciones-container {
            text-align: center;
            margin-top: 30px;
        }
        .opcion {
            display: inline-block;
            text-align: center;
            margin-right: 20px;
            border: 2px solid transparent;
            border-radius: 5px;
            transition: border-color 0.3s ease;
        }

        .opcion img {
            width: 200px;
            height: auto;
            display: block;
            margin: 0 auto;
            margin-bottom: 5px;
        }

        .opcion label {
            display: block;
            cursor: pointer;
        }

        .opcion:hover {
            border-color: #ccc;
        }

        .opcion.selected {
            border-color: #007bff;
        }

        input[type="submit"] {
            margin-top: 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
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
    <a href="./gestionarInfo.php"><div class="atras"><img src="./img/atras.png" alt="atrás"></div></a>
    <a href="./menuPrincipal.php"><div class="home"><img src="./img/home.png" alt="inicio"></div></a>
    <h1>¿Qué desea modificar?</h1>
    <div class="opciones-container">
        <form action="./Modificar/confirmarModificar.php" method="post">
            <div class="opcion">
                <input type="radio" id="modificar_autor" name="opcion_modificar" value="autor" checked>
                <label for="modificar_autor">
                    <img src="./img/Davinci.jpg" alt="Modificar Autor">
                    <span>Autor</span>
                </label>
            </div>
            <div class="opcion">
                <input type="radio" id="modificar_cuadro" name="opcion_modificar" value="cuadro">
                <label for="modificar_cuadro">
                    <img src="./img/MonaLisa.jpg" alt="Modificar Cuadro">
                    <span>Cuadro</span>
                </label>
            </div>
            <div class="opcion">
                <input type="radio" id="modificar_sala" name="opcion_modificar" value="sala">
                <label for="modificar_sala">
                    <img src="./img/Sala.jpg" alt="Modificar Sala">
                    <span>Sala</span>
                </label>
            </div>
            <br>
            <input type="submit" value="Modificar">
        </form>
    </div>
</body>
</html>