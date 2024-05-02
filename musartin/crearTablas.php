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
$basedatos="musartin";
if($mysqli->select_db($basedatos)) /*True si todo va bien*/
{
    echo "<br> BD seleccionada";
} 
else die("Error grave. BD no seleccionada");

$basedatos="musertin";
if($mysqli->select_db($basedatos)) /*True si todo va bien*/
{
    echo "<br> BD seleccionada";
} 
else die("Error grave. BD no seleccionada");

$consulta="CREATE TABLE IF NOT EXISTS autores ";
$consulta.="(autor_id INT PRIMARY KEY AUTO_INCREMENT,";
$consulta.="nombre VARCHAR(100), ";
$consulta.="fecha_nacimiento DATE ";
$consulta.="nacionalidad VARCHAR(100)); ";

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
    echo "<br> Tabla de Autores creada con éxito"; 
}

$consulta="CREATE TABLE IF NOT EXISTS salas ";
$consulta.="(sala_id INT PRIMARY KEY AUTO_INCREMENT,";
$consulta.="nombre VARCHAR(100), ";
$consulta.="ubicacion VARCHAR(100), ";
$consulta.="capacidad INT);";

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
    echo "<br> Tabla de salas creada con éxito"; 
}

$consulta="CREATE TABLE IF NOT EXISTS cuadros ";
$consulta.="(cuadro_id INT PRIMARY KEY AUTO_INCREMENT,";
$consulta.="titulo VARCHAR(100), ";
$consulta.="fecha_creacion INT, ";
$consulta.="tecnica VARCHAR(100), ";
$consulta.="estilo VARCHAR(100), ";
$consulta.="descripcion TEXT, ";
$consulta.="sala_id INT, ";
$consulta.="FOREIGN KEY (autor_id) REFERENCES Autores(autor_id), ";
$consulta.="FOREIGN KEY (sala_id) REFERENCES Salas(sala_id));";

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
    echo "<br> Tabla de cuadros creada con éxito"; 
}
?>
