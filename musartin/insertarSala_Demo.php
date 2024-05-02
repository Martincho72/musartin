<?php

require("usarMusartin.php");

$consulta="INSERT INTO salas (sala_id, nombre, capacidad) VALUES
    (null, 'Cuadros sin sala', 1000);";

if (!@$mysqli->query($consulta)) /*false fallo query, true si ok*/
{
    echo "Lo sentimos. Aplicación no funciona <br>";
    echo "error en la consulta $consulta <br>";
    echo "Num.error: ".$mysqli->errno."<br>";
    echo "Error: ".$mysqli->error."<br>";
    exit;
}

$consulta="INSERT INTO salas (sala_id, nombre, capacidad) VALUES
    (null, 'Espacio renacentista', 5);";

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
    echo "<br> SALA insertada"; 
}

$consulta="INSERT INTO salas (sala_id, nombre, capacidad) VALUES
    (null, 'Habitación Surrealista', 7);";

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
    echo "<br> SALA insertada"; 
}
?>