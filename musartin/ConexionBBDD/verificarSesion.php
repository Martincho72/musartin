<?php
session_start(); // Iniciar o reanudar sesión

if (isset($_REQUEST['usuario']) && isset($_REQUEST['clave'])) {

    $usuario = $_REQUEST['usuario'];
    $clave = $_REQUEST['clave'];
    
    if ($usuario == 'root' && $clave == '') { 
        // Usuario y contraseña correctos, establecer variables de sesión y redirigir a index.php
        $_SESSION['usuario'] = $usuario;
        $_SESSION['pwd'] = $clave;
        header('Location: ../index.php');
    } else {
        // Usuario o contraseña incorrectos, mostrar mensaje de error en la misma página
        echo "<script>alert('Usuario o contraseña incorrectos');</script>";
        // Redirigir de vuelta a la página de inicio de sesión después de mostrar el mensaje de error
        echo "<script>window.location.href = '../iniciarSesion.html';</script>";
    }
}
?>

