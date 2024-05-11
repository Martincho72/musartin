<?php
        session_start();
    if (!isset($_SESSION['usuario'])) {
    } else{
        header('Location: ./acceso.php');
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Inicio de sesión</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }
    .container {
        width: 450px;
        margin: 100px auto;
        background-color: #fff;
        padding: 40px 60px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    h2 {
        text-align: center;
        margin-bottom: 30px;
        font-size: 28px;
    }
    form {
        text-align: center;
    }
    label {
        display: block;
        margin-bottom: 10px;
        font-size: 18px;
    }
    input[type="text"],
    input[type="password"] {
        width: 100%;
        padding: 15px;
        margin-bottom: 20px;
        border: 2px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
    }
    input[type="submit"] {
        width: 100%;
        padding: 15px;
        background-color: #4CAF50;
        border: none;
        color: white;
        border-radius: 5px;
        cursor: pointer;
        font-size: 18px;
        transition: background-color 0.3s ease;
    }
    input[type="submit"]:hover {
        background-color: #45a049;
    }
</style>
</head>

<body>
<div class="container">
  <h2>Inicio de sesión Musartin</h2>
  <form id="form1" name="form1" method="post" action="./ConexionBBDD/verificarSesion.php">
    <label for="usuario">Usuario:</label>
    <input type="text" name="usuario" id="usuario" />
    <label for="clave">Contraseña:</label>
    <input type="password" name="clave" id="clave" />
    <input type="submit" name="enviar" id="enviar" value="Enviar" />
  </form>
</div>
</body>
</html>