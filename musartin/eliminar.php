<?php
    require("./ConexionBBDD/SesionIniciada.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar</title>
    <style>
        h1{
            text-align: center;
        }
        .opcion {
            display: inline-block;
            text-align: center;
            margin-right: 20px; /* Espacio entre las opciones */
        }

        .opcion img {
            width: 200px; /* Tamaño fijo para las imágenes */
            height: auto; /* Mantener la proporción de la imagen */
        }
    </style>
</head>
<body>
    <h1>¿Qué desea eliminar?</h1>
    <a href="./Eliminar/Autores/ListaAutores.php"><div class="opcion">
       <img src="./img/Davinci.jpg" alt="Borrar Autor">
        <h2>Autor</h2>
    </div></a>
    <a href="./Eliminar/Cuadros/ListaCuadros.php"><div class="opcion">
        <img src="./img/MonaLisa.jpg" alt="Borrar Cuadro">
        <h2>Cuadro</h2>
    </div></a>
    <a href="./Eliminar/Salas/ListaSalas.php"><div class="opcion">
        <img src="./img/Sala.jpg" alt="Borrar Sala">
        <h2>Sala</h2>
    </div></a>
</body>
</html>
