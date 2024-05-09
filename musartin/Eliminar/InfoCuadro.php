<?php
require("./../ConexionBBDD/SesionIniciada.php");
require("./../ConexionBBDD/usarMusartin.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrar Cuadro</title>
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
        input[type="number"],
        input[type="date"] {
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
        <form id="form1" name="form1" method="post" action="EliminarCuadro.php">
            <h1>FORMULARIO BORRAR CUADRO</h1>
            <label for="cuadro_id">ID CUADRO:</label>
            <input type="text" name="cuadro_id" id="cuadro_id" readonly="readonly"
                   value="<?php echo $_REQUEST['listado']; ?>" />
            <?php
            if(isset($_REQUEST['listado'])) {
                $cod=$_REQUEST['listado'];
                $consulta="SELECT * FROM cuadros WHERE cuadro_id='$cod';";

                if (!@$resultado= $mysqli->query($consulta)) {
                    echo "Lo sentimos. La aplicación no funciona<br>"   ;
                    echo "Error en la consulta $consulta <br>";
                    echo "Num.error: ".$mysqli->errno."<br>";
                    echo "Error: ".$mysqli->error."<br>";
                    exit;
                }
                while ($fila=$resultado->fetch_assoc()) {
                    echo "<label for='titulo'>Título:</label>
                          <input type='text' name='titulo' id='titulo' readonly='readonly'
                          value='".$fila['titulo']."' />
                        ";

                    echo "<label for='fecha_creacion'>Año de creación:</label>
                          <input type='number' name='fecha_creacion' id='fecha_creacion' readonly='readonly'
                          value='".$fila['fecha_creacion']."' />
                        ";

                    echo "<label for='tecnica'>Técnica:</label>
                          <input type='text' name='tecnica' id='tecnica' readonly='readonly'
                          value='".$fila['tecnica']."' />
                        ";

                    echo "<label for='estilo'>Estilo:</label>
                          <input type='text' name='estilo' id='estilo' readonly='readonly'
                          value='".$fila['estilo']."' />
                        ";

                    echo "<label for='descripcion'>Descripción:</label>
                          <input type='text' name='descripcion' id='descripcion' readonly='readonly'
                          value='".$fila['descripcion']."' />
                        ";

                    echo "<label for='autor_id'>Autor:</label>";
                    $consulta2 = "SELECT nombre FROM autores WHERE autor_id = " . $fila['autor_id'];
                    $resultado2 = $mysqli->query($consulta2);
                    $fila2 = $resultado2->fetch_assoc();
                    echo "<input type='text' id='autor_id' name='autor_id' value='".$fila2['nombre']."' readonly>";
                    echo "</p>";

                    echo "<label for='sala_id'>Sala:</label>";
                    $consulta3 = "SELECT nombre FROM salas WHERE sala_id = " . $fila['sala_id'];
                    $resultado3 = $mysqli->query($consulta3);
                    $fila3 = $resultado3->fetch_assoc();
                    echo "<input type='text' id='sala_id' name='sala_id' value='".$fila3['nombre']."' readonly>";
                    echo "</p>";
                }
            } else {
                header('Location: ./confirmarBorrar.php');
            }
            ?>

            <input type="submit" name="enviar" id="enviar" value="Borrar Cuadro" />
            <input type="reset" name="borrar" id="borrar" value="Restablecer" />
        </form>
    </div>
</body>
</html>