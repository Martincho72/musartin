<?php
    require("./../ConexionBBDD/SesionIniciada.php");
    require("./../ConexionBBDD/usarMusartin.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Autor</title>
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
        p {
            font-size: 24px;
            margin-bottom: 30px;
        }
        .boton {
            display: block;
            width: 80%;
            max-width: 300px;
            margin: 0 auto;
            padding: 15px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            transition: background-color 0.3s ease;
        }
        .boton:hover {
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
    <a href="../insertar.php"><div class="atras"><img src="../img/atras.png" alt="atrás"></div></a>
    <a href="../menuPrincipal.php"><div class="home"><img src="../img/home.png" alt="inicio"></div></a>
    <div class="container">
        <h1>Insertar Autor</h1>
        <?php
        if(isset($_REQUEST["nombre_autor"]) && isset($_REQUEST["fecha_nacimiento"]) && isset($_REQUEST["nombre_autor"])) {
            $nombre_autor = $_REQUEST["nombre_autor"];
            $fecha_nacimiento = $_REQUEST["fecha_nacimiento"];
            $nacionalidad = $_REQUEST["nacionalidad"];

            $consulta = "INSERT INTO autores (autor_id, nombre, fecha_nacimiento, nacionalidad) VALUES
                         (null, '$nombre_autor', '$fecha_nacimiento', '$nacionalidad');";

            if (!$resultado = $mysqli->query($consulta)) {
                echo "Lo sentimos. La Aplicación no funciona<br>";
                echo "Error en la consulta: ".$consulta."<br>";
                echo "Num.error: ".$mysqli->errno."<br>";
                echo "Error: ".$mysqli->error. "<br>";
                exit;
            } else {
                echo "<p> Autor Insertado ✅ </p>";
            }
            echo  "<br> <a href=../insertar.php class=boton>Volver</a>";
        } else {
            header('Location: ../insertar.php');
        }
        ?>
    </div>
</body>
</html>