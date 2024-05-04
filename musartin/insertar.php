<?php
    require("./ConexionBBDD/SesionIniciada.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formularios de Autor, Sala y Cuadro</title>
</head>
<body>
    <h1>Formulario de Autor</h1>
    <form action="./Insertar/insertarAutor.php" method="post">
        <label for="nombre_autor">Nombre del Autor:</label>
        <input type="text" id="nombre_autor" name="nombre_autor" required><br>
        <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required><br>
        <label for="nacionalidad">Nacionalidad:</label>
        <input type="text" id="nacionalidad" name="nacionalidad" required><br>
        <input type="submit" value="Agregar Autor">
    </form>

    <h1>Formulario de Sala</h1>
    <form action="./Insertar/insertarSala.php" method="post">
        <label for="nombre_sala">Nombre de la Sala:</label>
        <input type="text" id="nombre_sala" name="nombre_sala" required><br>
        <label for="ubicacion">Ubicación:</label>
        <input type="text" id="ubicacion" name="ubicacion" required><br>
        <label for="capacidad">Capacidad:</label>
        <input type="number" id="capacidad" name="capacidad" required><br>
        <input type="submit" value="Agregar Sala">
    </form>

    <h1>Formulario de Cuadro</h1>
    <form action="./Insertar/insertarCuadro.php" method="post">
        <label for="titulo_cuadro">Título del Cuadro:</label>
        <input type="text" id="titulo_cuadro" name="titulo_cuadro" required><br>
        <label for="fecha_creacion">Fecha de Creación:</label>
        <input type="date" id="fecha_creacion" name="fecha_creacion" required><br>
        <label for="tecnica">Técnica:</label>
        <input type="text" id="tecnica" name="tecnica" required><br>
        <label for="estilo">Estilo:</label>
        <input type="text" id="estilo" name="estilo" required><br>
        <label for="descripcion">Descripción:</label><br>
        <textarea id="descripcion" name="descripcion" rows="4" cols="50" required></textarea><br>
        
        <label for="autor_id">Selecciona el Autor:</label>
        <select id="autor_id" size="1" name="autor_id" required>
            <?php
            mysqli_report(MYSQLI_REPORT_ERROR);
            require("./ConexionBBDD/usarMusartin.php");

            $consulta_autores = "SELECT autor_id, nombre FROM autores;";
            $resultado_autores = $mysqli->query($consulta_autores);

            while ($fila_autor = $resultado_autores->fetch_assoc()) {
                $nombre_autor = $fila_autor["nombre"];
                $id_autor = $fila_autor["autor_id"];
                echo ("<option value='$id_autor'>$nombre_autor</option>");
            }
            ?>
        </select><br>

        <label for="sala_id">Selecciona la Sala:</label>
        <select id="sala_id" name="sala_id" required>
            <?php
            $consulta_salas = "SELECT sala_id, nombre FROM salas;";
            $resultado_salas = $mysqli->query($consulta_salas);

            while ($fila_sala = $resultado_salas->fetch_assoc()) {
                $nombre_sala = $fila_sala["nombre"];
                $id_sala = $fila_sala["sala_id"];
                echo ("<option value='$id_sala'>$nombre_sala</option>");
            }
            ?>
        </select><br>
        
        <input type="submit" value="Agregar Cuadro">
    </form>
</body>
</html>