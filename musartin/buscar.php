<?php
    require("./ConexionBBDD/SesionIniciada.php");
    require("./ConexionBBDD/existeBBDD.php");
    require("./ConexionBBDD/usarMusartin.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Búsqueda</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        h1 {
            text-align: center;
            margin-top: 20px;
            color: #333;
        }
        form {
            background-color: #fff;
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }
        select, input[type="submit"] {
            width: calc(100% - 20px);
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
            color: #333;
            font-size: 16px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .atras {
            position: absolute;
            top: 1%;
            left: 1%;
        }
        .home {
            position: absolute;
            top: 1%;
            right: 1%;
        }
        .atras img {
            height: 64px;
            width: 64px;
        }
        .home img {
            height: 64px;
            width: 64px;
        }
    </style>
</head>
<body>
    <a href="./gestionarInfo.php"><div class="atras"><img src="./img/atras.png" alt="atrás"></div></a>
    <a href="./menuPrincipal.php"><div class="home"><img src="./img/home.png" alt="inicio"></div></a>
    <h1>Búsqueda</h1>

    <form id="form_autor" name="form_autor" method="post" action="./Buscar/buscarAutor.php">
        <label for="listado_autor">Autor a buscar:</label>
        <select name="listado" size="1" id="listado_autor">
            <?php
            mysqli_report(MYSQLI_REPORT_ERROR);
            $consulta = "SELECT autor_id, nombre FROM autores;";
            $resultado = $mysqli->query($consulta);
            while ($fila = $resultado->fetch_assoc()) {
                $n = $fila["nombre"];
                echo ("<option value=" . $fila['autor_id'] . ">" . $n . "</option>");
            }
            ?>
        </select>
        <input type="submit" name="enviar" id="enviar_autor" value="Buscar Autor" />
    </form>

    <form id="form_cuadro" name="form_cuadro" method="post" action="./Buscar/buscarCuadro.php">
        <label for="listado_cuadro">Cuadro a buscar:</label>
        <select name="listado" size="1" id="listado_cuadro">
            <?php
            mysqli_report(MYSQLI_REPORT_ERROR);
            $consulta = "SELECT cuadro_id, titulo FROM cuadros;";
            $resultado = $mysqli->query($consulta);
            while ($fila = $resultado->fetch_assoc()) {
                $n = $fila["titulo"];
                echo ("<option value=" . $fila['cuadro_id'] . ">" . $n . "</option>");
            }
            ?>
        </select>
        <input type="submit" name="enviar" id="enviar_cuadro" value="Buscar Cuadro" />
    </form>

    <form id="form_sala" name="form_sala" method="post" action="./Buscar/buscarSala.php">
        <label for="listado_sala">Sala a buscar:</label>
        <select name="listado" size="1" id="listado_sala">
            <?php
            mysqli_report(MYSQLI_REPORT_ERROR);
            $consulta = "SELECT sala_id, nombre FROM salas;";
            $resultado = $mysqli->query($consulta);
            while ($fila = $resultado->fetch_assoc()) {
                $n = $fila["nombre"];
                echo ("<option value=" . $fila['sala_id'] . ">" . $n . "</option>");
            }
            ?>
        </select>
        <input type="submit" name="enviar" id="enviar_sala" value="Buscar Sala" />
    </form>
</body>
</html>