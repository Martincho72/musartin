<?php
mysqli_report(MYSQLI_REPORT_ERROR);
$servidor="localhost";
$usuario="root";
$clave="";

@$mysqli = new mysqli($servidor,$usuario,$clave);
if ($mysqli->connect_errno)
{
  echo "Fallo conexión a Mysql: ".$mysqli->connect_errno." ".$mysqli->connect_error;
  die ("Salida del programa. Error acceso BBDD");
}

$basedatos="musartin";
$mysqli->select_db($basedatos);

?>