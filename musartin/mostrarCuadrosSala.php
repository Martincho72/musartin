<?php
require("./ConexionBBDD/SesionIniciada.php");
require("./ConexionBBDD/usarMusartin.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuadros de la Sala</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
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
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        th {
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
    <a href="./cuadrosSala.php"><div class="atras"><img src="./img/atras.png" alt="atrás"></div></a>
    <a href="./menuPrincipal.php"><div class="home"><img src="./img/home.png" alt="inicio"></div></a>
<div class="container">
    <?php
    if(isset($_REQUEST['listado'])){
        $sala_id = $_REQUEST['listado'];

        $consulta_cuadros = "SELECT cuadros.*, autores.nombre AS nombre_autor, salas.nombre AS nombre_sala 
        FROM cuadros
        LEFT JOIN autores ON cuadros.autor_id = autores.autor_id
        LEFT JOIN salas ON cuadros.sala_id = salas.sala_id
        WHERE cuadros.sala_id = $sala_id";
        $resultado_cuadros = $mysqli->query($consulta_cuadros);

        if ($resultado_cuadros->num_rows > 0) {
            echo "<h1>Cuadros de la Sala</h1>";
            echo "<table>";
            echo "<tr><th>ID</th><th>Título</th><th>Fecha de Creación</th><th>Técnica</th><th>Estilo</th><th>Descripción</th><th>Autor ID</th><th>Sala ID</th></tr>";

            while ($fila_cuadros = $resultado_cuadros->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $fila_cuadros['cuadro_id'] . "</td>";
                echo "<td>" . $fila_cuadros['titulo'] . "</td>";
                echo "<td>" . $fila_cuadros['fecha_creacion'] . "</td>";
                echo "<td>" . $fila_cuadros['tecnica'] . "</td>";
                echo "<td>" . $fila_cuadros['estilo'] . "</td>";
                echo "<td>" . $fila_cuadros['descripcion'] . "</td>";
                echo "<td>" . $fila_cuadros['nombre_autor'] . " (ID: " . $fila_cuadros['autor_id'] . ")</td>";
                echo "<td>" . $fila_cuadros['nombre_sala'] . " (ID: " . $fila_cuadros['sala_id'] . ")</td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "No se encontraron cuadros para esta sala.";
        }
    }
    ?>
</div>
</body>
</html>