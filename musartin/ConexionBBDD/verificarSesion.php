<?php
session_start();

if (isset($_REQUEST['usuario']) && isset($_REQUEST['clave'])) {

    $usuario = $_REQUEST['usuario'];
    $clave = $_REQUEST['clave'];
    
    if ($usuario == 'root' && $clave == '') { 
        $_SESSION['usuario'] = $usuario;
        $_SESSION['pwd'] = $clave;
        header('Location: ../acceso.php');
    } else {
        echo "<script>alert('Usuario o contraseña incorrectos');</script>";
        echo "<script>window.location.href = '../iniciarSesion.php';</script>";
    }
}
?>