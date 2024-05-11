<?php
    require("./../ConexionBBDD/SesionIniciada.php");
    require("./../ConexionBBDD/usarMusartin.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Cuadro</title>
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
        .atras {
            position: absolute;
            top:1%;
            left:1%;
        }
        .home {
            position: absolute;
            top:1%;
            right:1%;
        }
        .atras img {
            height:64px;
            width: 64px;
        }
        .home img {
            height:64px;
            width: 64px;
        }
    </style>
</head>
<body>
    <a href="../modificar.php"><div class="atras"><img src="../img/atras.png" alt="atrás"></div></a>
    <a href="../menuPrincipal.php"><div class="home"><img src="../img/home.png" alt="inicio"></div></a>
    <div class="container">
        <?php
        if(isset($_REQUEST["cuadro_id"]) && isset($_REQUEST["titulo"]) && isset($_REQUEST["fecha_creacion"]) && isset($_REQUEST["tecnica"]) && isset($_REQUEST["estilo"]) && isset($_REQUEST["autor_id"]) && isset($_REQUEST["sala_id"]) && isset($_REQUEST["sala_id_antiguo"])) {
            $cuadro_id = $_REQUEST["cuadro_id"];
            $titulo = $_REQUEST["titulo"];
            $fecha_creacion = $_REQUEST["fecha_creacion"];
            $tecnica = $_REQUEST["tecnica"];
            $estilo = $_REQUEST["estilo"];
            $descripcion = $_REQUEST["descripcion"];
            $autor_id = $_REQUEST["autor_id"];
            $sala_id = $_REQUEST["sala_id"];
            $sala_id_antiguo = $_REQUEST["sala_id_antiguo"];
            $consulta_capacidad = "SELECT sala_id, cuadros_actuales, maximo_cuadros FROM salas WHERE sala_id = '$sala_id'";

            $resultado_capacidad = $mysqli->query($consulta_capacidad);

            if (!$resultado_capacidad) {
                echo "Error al obtener la capacidad actual de la sala";
                exit;
            } else {
                $fila_capacidad = $resultado_capacidad->fetch_assoc();
                $capacidad_actual = $fila_capacidad['cuadros_actuales'];
                $capacidad_maxima = $fila_capacidad['maximo_cuadros'];
    
                if (($capacidad_actual >= $capacidad_maxima) && ($sala_id != $sala_id_antiguo)) {
                    echo "<h1> La sala está llena. No se puede mover el cuadro. </h1>";
                } else {
                    $consulta = "UPDATE cuadros SET titulo='$titulo', fecha_creacion='$fecha_creacion', tecnica='$tecnica', estilo='$estilo', descripcion='$descripcion', autor_id='$autor_id', sala_id='$sala_id' WHERE cuadro_id='$cuadro_id'";
    
                    if (!$resultado = $mysqli->query($consulta)) {
                        echo "Lo sentimos. La Aplicación no funciona<br>";
                        echo "Error en la consulta: ".$consulta."<br>";
                        echo "Num.error: ".$mysqli->errno."<br>";
                        echo "Error: ".$mysqli->error. "<br>";
                        exit;
                    } else {
                        echo "<h1> Cuadro Modificado <h1>";
                    }
                }
            }
            echo  "<a href=../modificar.php class=boton>Volver</a>";
        } else {
            header('Location: ./InfoCuadro.php');
        }
        ?>
    </div>
</body>
</html>