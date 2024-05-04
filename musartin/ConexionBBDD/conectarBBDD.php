<?php
mysqli_report(MYSQLI_REPORT_ERROR);
$servidor="localhost";
$usuario="root";
$clave="";

@$mysqli= new mysqli($servidor, $usuario, $clave);
if ($mysqli->connect_errno)
{
    echo "<br> Fallo al conectar a Mysql: ".$mysqli->connect_error." ".$mysqli->connect_errno;
} 
else
{
    echo "Te has conectado al servidor MYSQL"; 
}
?>