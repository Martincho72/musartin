<?php
    require("./ConexionBBDD/SesionIniciada.php");
    require("./ConexionBBDD/existeBBDD.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        h1, h2 {
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
        input[type="text"], input[type="date"], input[type="number"], textarea, select {
            width: calc(100% - 20px);
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 15px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
            color: #333;
            font-size: 16px;
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
    <h1>Insertar</h1>

    <h2>Formulario de Autor</h2>
    <form action="./Insertar/insertarAutor.php" method="post">
        <label for="nombre_autor">Nombre del Autor:</label>
        <input type="text" id="nombre_autor" name="nombre_autor" required><br>
        <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required><br>
        <label for="nacionalidad">Nacionalidad:</label>
        <input type="text" id="nacionalidad" name="nacionalidad" required><br>
        <input type="submit" value="Agregar Autor">
    </form>

    <h2>Formulario de Sala</h2>
    <form action="./Insertar/insertarSala.php" method="post">
        <label for="nombre_sala">Nombre de la Sala:</label>
        <input type="text" id="nombre_sala" name="nombre_sala" required><br>
        <label for="ubicacion">Ubicación:</label>
        <input type="text" id="ubicacion" name="ubicacion" required><br>
        <label for="capacidad_maxima">Capacidad Máxima:</label>
        <input type="number" id="capacidad_maxima" name="capacidad_maxima" required min="0"><br>
        <input type="submit" value="Agregar Sala">
    </form>

    <h2>Formulario de Cuadro</h2>
    <form action="./Insertar/insertarCuadro.php" method="post">
        <label for="titulo_cuadro">Título del Cuadro:</label>
        <input type="text" id="titulo_cuadro" name="titulo_cuadro" required><br>
        <label for="fecha_creacion">Fecha de Creación:</label>
        <input type="date" id="fecha_creacion" name="fecha_creacion" required><br>
        <label for="tecnica">Técnica:</label>
        <input type="text" id="tecnica" name="tecnica" required><br>
        <label for="estilo">Estilo:</label>
        <input type="text" id="estilo" name="estilo" required><br>
        <label for="descripcion">Descripción:</label><br>
        <textarea id="descripcion" name="descripcion" rows="4" cols="50" required></textarea><br>
        
        <label for="autor_id">Selecciona el Autor:</label>
        <select id="autor_id" size="1" name="autor_id" required>
            <?php
            mysqli_report(MYSQLI_REPORT_ERROR);
            require("./ConexionBBDD/usarMusartin.php");

            $consulta_autores = "SELECT autor_id, nombre FROM autores;";
            $resultado_autores = $mysqli->query($consulta_autores);

            while ($fila_autor = $resultado_autores->fetch_assoc()) {
                $nombre_autor = $fila_autor["nombre"];
                $id_autor = $fila_autor["autor_id"];
                echo ("<option value='$id_autor'>$nombre_autor</option>");
            }
            ?>
        </select><br>

        <label for="sala_id">Selecciona la Sala:</label>
        <select id="sala_id" name="sala_id" required>
            <?php
            $consulta_salas = "SELECT sala_id, nombre FROM salas;";
            $resultado_salas = $mysqli->query($consulta_salas);

            while ($fila_sala = $resultado_salas->fetch_assoc()) {
                $nombre_sala = $fila_sala["nombre"];
                $id_sala = $fila_sala["sala_id"];
                echo ("<option value='$id_sala'>$nombre_sala</option>");
            }
            ?>
        </select><br>
        
        <input type="submit" value="Agregar Cuadro">
    </form>
</body>
</html>