<?php
    require("./ConexionBBDD/SesionIniciada.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar</title>
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
            <input type="submit" value="Eliminar">
        </form>
    </div>
</body>
</html>
