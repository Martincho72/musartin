<?php
    require("./../ConexionBBDD/SesionIniciada.php");
    require("./../ConexionBBDD/usarMusartin.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmar Borrar</title>
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
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }
        form {
            text-align: center;
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            margin-bottom: 20px;
        }
        input[type="submit"] {
            width: 100%;
            padding: 15px;
            background-color: #4CAF50;
            border: none;
            color: white;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
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
    <a href="../eliminar.php"><div class="atras"><img src="../img/atras.png" alt="atrás"></div></a>
    <a href="../menuPrincipal.php"><div class="home"><img src="../img/home.png" alt="inicio"></div></a>
    <div class="container">
        <div class="opciones-container">
            <form method="post">
                <?php
                if (isset($_REQUEST['opcion_eliminar'])) {
                    if ($_REQUEST['opcion_eliminar'] == 'autor') {
                        echo '<h1><label for="listado">Eliminar Autor:</label></h1>
                        <select name="listado" size="1" id="listado">';

                        mysqli_report(MYSQLI_REPORT_ERROR);
                        $consulta ="SELECT autor_id, nombre FROM autores ;";
                        $resultado=$mysqli->query($consulta);
                        while ($fila = $resultado ->fetch_assoc()) {
                            $n=$fila["nombre"];
                            echo ("<option value=".$fila['autor_id'].">".$n."</option>");
                        }

                        echo '</select>
                        <input type="submit" name="enviar" id="enviar" value="Enviar" formaction="./InfoAutor.php"/>';
                    } elseif ($_REQUEST['opcion_eliminar'] == 'cuadro') {
                        echo '<h1><label for="listado">Eliminar Cuadro:</label></h1>
                        <select name="listado" size="1" id="listado">';

                        mysqli_report(MYSQLI_REPORT_ERROR);
                        $consulta ="SELECT cuadro_id, titulo FROM cuadros ;";
                        $resultado=$mysqli->query($consulta);
                        while ($fila = $resultado ->fetch_assoc()) {
                            $n=$fila["titulo"];
                            echo ("<option value=".$fila['cuadro_id'].">".$n."</option>");
                        }

                        echo '</select>
                        <input type="submit" name="enviar" id="enviar" value="Enviar" formaction="./InfoCuadro.php"/>';
                    } elseif ($_REQUEST['opcion_eliminar'] == 'sala') {
                        echo '<h1><label for="listado">Eliminar Sala:</label></h1>
                        <select name="listado" size="1" id="listado">';

                        mysqli_report(MYSQLI_REPORT_ERROR);
                        $consulta ="SELECT sala_id, nombre FROM salas ;";
                        $resultado=$mysqli->query($consulta);
                        while ($fila = $resultado ->fetch_assoc()) {
                            $n=$fila["nombre"];
                            echo ("<option value=".$fila['sala_id'].">".$n."</option>");
                        }

                        echo '</select>
                        <input type="submit" name="enviar" id="enviar" value="Enviar" formaction="./InfoSala.php"/>';
                    }
                } else {
                    header('Location: ../eliminar.php');
                }
                ?>
            </form>
        </div>
    </div>
</body>
</html>