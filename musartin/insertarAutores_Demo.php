<?php

require("usarMusartin.php");

$consulta="INSERT INTO autores (autor_id, nombre, fecha_nacimiento, nacionalidad) VALUES
    (null, 'Pablo Picasso', '1881-10-25', Español);";

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
    echo "<br> AUTOR insertado"; 
}

$consulta="INSERT INTO autores (autor_id, nombre, fecha_nacimiento, nacionalidad) VALUES
    (null, 'Leonardo Da Vinci', '1452-04-15', Italiano);";

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
    echo "<br> AUTOR insertado"; 
}
?>