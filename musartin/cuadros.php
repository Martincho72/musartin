<?php
require("./ConexionBBDD/SesionIniciada.php");
require("./ConexionBBDD/usarMusartin.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuadros</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 1100px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f2f2f2;
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
    <a href="./menuPrincipal.php"><div class="atras"><img src="./img/atras.png" alt="atrás"></div></a>
    <a href="./menuPrincipal.php"><div class="home"><img src="./img/home.png" alt="inicio"></div></a>
    <div class="container">
        <h1>Información de los cuadros</h1>
        <?php
        $consulta = "SELECT cuadros.*, autores.nombre AS nombre_autor, salas.nombre AS nombre_sala FROM cuadros
                     LEFT JOIN autores ON cuadros.autor_id = autores.autor_id
                     LEFT JOIN salas ON cuadros.sala_id = salas.sala_id";
        $resultado = $mysqli->query($consulta);

        if ($resultado->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>ID</th><th>Título</th><th>Fecha de Creación</th><th>Técnica</th><th>Estilo</th><th>Descripción</th><th>Autor</th><th>Sala</th></tr>";

            while ($fila = $resultado->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $fila['cuadro_id'] . "</td>";
                echo "<td>" . $fila['titulo'] . "</td>";
                echo "<td>" . $fila['fecha_creacion'] . "</td>";
                echo "<td>" . $fila['tecnica'] . "</td>";
                echo "<td>" . $fila['estilo'] . "</td>";
                echo "<td>" . $fila['descripcion'] . "</td>";
                echo "<td>" . $fila['nombre_autor'] . " (ID: " . $fila['autor_id'] . ")</td>";
                echo "<td>" . $fila['nombre_sala'] . " (ID: " . $fila['sala_id'] . ")</td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "No se encontraron cuadros.";
        }
        $mysqli->close();
        ?>
    </div>
</body>
</html>