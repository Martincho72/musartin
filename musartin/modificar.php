<?php
    require("./ConexionBBDD/SesionIniciada.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar</title>
    <style>
        h1 {
            text-align: center;
        }
        .opciones-container {
            text-align: center;
        }
        .opcion {
            display: inline-block;
            text-align: center;
            margin-right: 20px;
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
            background-color: #f0f0f0;
        }
    </style>
</head>
<body>
    <h1>¿Qué desea modificar?</h1>
    <div class="opciones-container">
        <form action="./Modificar/confirmarModificar.php" method="post">
            <div class="opcion">
                <input type="radio" id="modificar_autor" name="opcion_modificar" value="autor" checked>
                <label for="modificar_autor">
                    <img src="./img/Davinci.jpg" alt="Borrar Autor">
                    <span>Autor</span>
                </label>
            </div>
            <div class="opcion">
                <input type="radio" id="modificar_cuadro" name="opcion_modificar" value="cuadro">
                <label for="modificar_cuadro">
                    <img src="./img/MonaLisa.jpg" alt="Borrar Cuadro">
                    <span>Cuadro</span>
                </label>
            </div>
            <div class="opcion">
                <input type="radio" id="modificar_sala" name="opcion_modificar" value="sala">
                <label for="modificar_sala">
                    <img src="./img/Sala.jpg" alt="Borrar Sala">
                    <span>Sala</span>
                </label>
            </div>
            <input type="submit" value="Modificar">
        </form>
    </div>
</body>
</html>
