<?php
require("./../ConexionBBDD/SesionIniciada.php");
require("./../ConexionBBDD/usarMusartin.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrar Sala</title>
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
        form {
            text-align: center;
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        input[type="text"],
        input[type="number"] {
            width: calc(100% - 20px);
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            margin-bottom: 20px;
        }
        input[type="submit"],
        input[type="reset"] {
            width: calc(50% - 10px);
            padding: 15px;
            background-color: #4CAF50;
            border: none;
            color: white;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover,
        input[type="reset"]:hover {
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
        <form id="form1" name="form1" method="post" action="EliminarSala.php">
            <h1>FORMULARIO DE BORRADO DE SALA</h1>
            <label for="sala_id">ID SALA:</label>
            <input type="text" name="sala_id" id="sala_id" readonly="readonly"
                   value="<?php echo $_REQUEST['listado']; ?>" />
            <?php
            if(isset($_REQUEST['listado'])) {
                $cod=$_REQUEST['listado'];
                $consulta="SELECT * FROM salas WHERE sala_id='$cod';";

                if (!@$resultado= $mysqli->query($consulta)) {
                    echo "Lo sentimos. La aplicación no funciona<br>"   ;
                    echo "Error en la consulta $consulta <br>";
                    echo "Num.error: ".$mysqli->errno."<br>";
                    echo "Error: ".$mysqli->error."<br>";
                    exit;
                }
                while ($fila=$resultado->fetch_assoc()) {
                    echo "<label for='nombre'>Nombre:</label>
                          <input type='text' name='nombre' id='nombre' readonly='readonly'
                          value='".$fila['nombre']."' />
                        ";

                    echo "<label for='ubicacion'>Ubicación:</label>
                          <input type='text' name='ubicacion' id='ubicacion' readonly='readonly'
                          value='".$fila['ubicacion']."' />
                        ";

                    echo "<label for='maximo_cuadros'>Capacidad Máxima:</label>
                          <input type='number' name='maximo_cuadros' id='maximo_cuadros' readonly='readonly'
                          value='".$fila['maximo_cuadros']."' />
                        ";

                    echo "<label for='cuadros_actuales'>Número de Cuadros actuales:</label>
                          <input type='number' name='cuadros_actuales' id='cuadros_actuales' readonly='readonly'
                          value='".$fila['cuadros_actuales']."' />
                        ";
                }
            } else {
                header('Location: ./confirmarBorrar.php');
            }
            ?>

            <input type="submit" name="enviar" id="enviar" value="Borrar Sala" />
            <input type="reset" name="borrar" id="borrar" value="Restablecer" />
        </form>
    </div>
</body>
</html>