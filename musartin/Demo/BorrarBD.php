<?php
    session_start();
    
    if (!isset($_SESSION['usuario'])) {
        header('Location: ../iniciarSesion.html');
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Base de Datos</title>
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
        a {
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
        a:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Eliminar Base de Datos</h1>
        <?php
        $servidor = "localhost";
        $usuario = "root";
        $clave = "";

        $mysqli = new mysqli($servidor, $usuario, $clave);
        if ($mysqli->connect_errno) {
            echo "<p>Fallo al conectar a MySQL: " . $mysqli->connect_error . " " . $mysqli->connect_errno . "</p>";
            die("<p>Salida del programa. Fatal Error</p>");
        }

        $basedatos = "musartin";

        $resultado = $mysqli->query("SHOW DATABASES LIKE '$basedatos'");
        if ($resultado->num_rows == 1) {
            $consulta = "DROP DATABASE $basedatos";

            if (!$mysqli->query($consulta)) {
                echo "<p>Error al borrar la Base de datos: " . $mysqli->error . "</p>";
            } else {
                echo "<p>La base de datos ha sido borrada exitosamente. ✅</p>";
            }
        } else {
            echo "<p>NO se puede borrar la base de datos, no existe. ❌</p>";
        }

        $mysqli->close();
        ?>
        <a href="../acceso.php">Volver</a>
    </div>
</body>
</html>