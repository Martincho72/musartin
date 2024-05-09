<?php
require("./../ConexionBBDD/SesionIniciada.php");
require("./../ConexionBBDD/usarMusartin.php");

/*Función para verificar si una sala está llena*/
function salaLlena($sala_id) {
    global $mysqli;
    $consulta_capacidad = "SELECT cuadros_actuales, maximo_cuadros FROM salas WHERE sala_id = $sala_id";
    $resultado_capacidad = $mysqli->query($consulta_capacidad);
    if (!$resultado_capacidad) {
        echo "Error al obtener la capacidad de la sala";
        exit;
    }
    $fila_capacidad = $resultado_capacidad->fetch_assoc();
    $capacidad_actual = $fila_capacidad['cuadros_actuales'];
    $capacidad_maxima = $fila_capacidad['maximo_cuadros'];
    return $capacidad_actual >= $capacidad_maxima;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Cuadro</title>
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
        <h1>Insertar Cuadro</h1>
        <?php
        if(isset($_REQUEST["titulo_cuadro"]) && isset($_REQUEST["fecha_creacion"]) && isset($_REQUEST["tecnica"]) && isset($_REQUEST["estilo"]) && isset($_REQUEST["autor_id"]) && isset($_REQUEST["sala_id"])){
            $titulo_cuadro = $_REQUEST["titulo_cuadro"];
            $fecha_creacion = $_REQUEST["fecha_creacion"];
            $tecnica = $_REQUEST["tecnica"];
            $estilo = $_REQUEST["estilo"];
            $descripcion = $_REQUEST["descripcion"];
            $autor_id = $_REQUEST["autor_id"];
            $sala_id = $_REQUEST["sala_id"];
            if (salaLlena($sala_id)) {
                if (salaLlena(1)) {
                    echo "<p> Lo sentimos, tanto la sala como el almacén están llenos. ❌ </p>";
                } else {
                    $sala_id = 1;
                    $consulta_insertar_cuadro = "INSERT INTO cuadros (cuadro_id, titulo, fecha_creacion, tecnica, estilo, descripcion, autor_id, sala_id) VALUES
                         (null, '$titulo_cuadro', '$fecha_creacion', '$tecnica', '$estilo', '$descripcion', '$autor_id', '$sala_id')";
                    if (!$resultado_insertar_cuadro = $mysqli->query($consulta_insertar_cuadro)) {
                        echo "<p> Error al insertar el cuadro en el almacén ❌ </p>";
                        exit;
                    } else {
                        echo "<p> El cuadro se ha guaradado en el almacén ya que no había espacio para la sala seleccionada. 🏛 </p>";
                    }
                }
            } else {
                $consulta_insertar_cuadro = "INSERT INTO cuadros (cuadro_id, titulo, fecha_creacion, tecnica, estilo, descripcion, autor_id, sala_id) VALUES
                         (null, '$titulo_cuadro', '$fecha_creacion', '$tecnica', '$estilo', '$descripcion', '$autor_id', '$sala_id')";
                if (!$resultado_insertar_cuadro = $mysqli->query($consulta_insertar_cuadro)) {
                    echo "<p> Error al insertar el cuadro en la sala ❌ </p>";
                    exit;
                } else {
                    echo "<p> Cuadro Insertado en la sala. ✅ </p>";
                }
            }

            echo "<br> <a href=../insertar.php class=boton>Volver</a>";
        } else {
            header('Location: ../insertar.php');
        }
        ?>
    </div>
</body>
</html>