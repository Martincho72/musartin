<?php
    require("./ConexionBBDD/SesionIniciada.php");
    require("./ConexionBBDD/existeBBDD.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar</title>
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
    <h1>¿Qué desea eliminar?</h1>
    <div class="opciones-container">
        <form action="./Eliminar/confirmarBorrar.php" method="post">
            <div class="opcion">
                <input type="radio" id="eliminar_autor" name="opcion_eliminar" value="autor" checked>
                <label for="eliminar_autor">
                    <img src="./img/Davinci.jpg" alt="Borrar Autor">
                    <span>Autor</span>
                </label>
            </div>
            <div class="opcion">
                <input type="radio" id="eliminar_cuadro" name="opcion_eliminar" value="cuadro">
                <label for="eliminar_cuadro">
                    <img src="./img/MonaLisa.jpg" alt="Borrar Cuadro">
                    <span>Cuadro</span>
                </label>
            </div>
            <div class="opcion">
                <input type="radio" id="eliminar_sala" name="opcion_eliminar" value="sala">
                <label for="eliminar_sala">
                    <img src="./img/Sala.jpg" alt="Borrar Sala">
                    <span>Sala</span>
                </label>
            </div>
            <br>
            <input type="submit" value="Eliminar">
        </form>
    </div>
</body>
</html>