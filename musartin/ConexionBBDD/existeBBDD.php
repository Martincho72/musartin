<?php
    $servidor = "localhost";
    $usuario = "root";
    $clave = "";

    $mysqli = new mysqli($servidor, $usuario, $clave);
    if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MySQL: " . $mysqli->connect_error . " " . $mysqli->connect_errno;
        die("<br> Salida del programa. Fatal Error");
    }

    $basedatos = "musartin";

    $resultado = $mysqli->query("SHOW DATABASES LIKE '$basedatos'");
    if ($resultado->num_rows == 1) {
        header('Location: ../menuPrincipal.php');
    } else {
        echo "<script>alert('No se pudo conectar a la base de datos porque no existe.');</script>";
        echo "<script>window.location.href = '../acceso.php';</script>";
    }

    $mysqli->close();
?>