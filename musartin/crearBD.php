<?php
mysqli_report(MYSQLI_REPORT_ERROR);
$servidor="localhost";
$usuario="root";
$clave="";

@$mysqli= new mysqli($servidor, $usuario, $clave);
if ($mysqli->connect_errno)
{
    echo "<br> Fallo al conectar a Mysql: ".$mysqli->connect_error." ".$mysqli->connect_errno;
    die("<br> Salida del programa. Fatal Error");
} 
else
{
    echo "Te has conectado al servidor MYSQL"; 
}

$consulta="CREATE DATABASE IF NOT EXISTS musartin;";
if (!@$mysqli->query($consulta)) /*false fallo query, true si ok*/
{
    echo "Lo sentimos. Aplicación no funciona <br>";
    echo "error en la consulta $consulta <br>";
    echo "Num.error: ".$mysqli->errno."<br>";
    echo "Error: ".$mysqli->error."<br>";
    exit;
}
else
{
    echo "<br> BD creado con éxito"; 
}

?>