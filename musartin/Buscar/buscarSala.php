<?php
    require("./../ConexionBBDD/SesionIniciada.php");
    require("./../ConexionBBDD/usarMusartin.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Búsqueda Sala</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
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
    <a href="../buscar.php">
        <div class="atras"><img src="../img/atras.png" alt="atrás"></div>
    </a>
    <a href="../menuPrincipal.php">
        <div class="home"><img src="../img/home.png" alt="inicio"></div>
    </a>
    <div class="container">
        <h1>Resultado Búsqueda</h1>
        <?php
            if(isset($_REQUEST['listado'])){
                $sala_id = $_REQUEST['listado'];

                $consulta  = "SELECT * FROM salas WHERE sala_id = $sala_id";
                $resultado = $mysqli->query($consulta);

                if ($resultado->num_rows > 0) {
                    echo "<table>";
                    echo "<tr><th>ID</th><th>Nombre</th><th>Ubicación</th><th>Cantidad máxima de cuadros</th><th>Cuadros Actuales</th></tr>";

                    while ($fila = $resultado->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $fila['sala_id'] . "</td>";
                        echo "<td>" . $fila['nombre'] . "</td>";
                        echo "<td>" . $fila['ubicacion'] . "</td>";
                        echo "<td>" . $fila['maximo_cuadros'] . "</td>";
                        echo "<td>" . $fila['cuadros_actuales'] . "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                } else {
                    echo "No se encontraron salas.";
                }
            } else {
                header('Location: ../buscar.php');
            }
        ?>
    </div>
</body>
</html>