<?php
    session_start(); // Iniciar o reanudar sesión
    // Verificar si el usuario no ha iniciado sesión
    if (!isset($_SESSION['usuario'])) {
        // Redirigir a la página de inicio de sesión
        header('Location: ./iniciarSesion.html');
    }
?>