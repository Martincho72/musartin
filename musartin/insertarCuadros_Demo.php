<?php

require("usarMusartin.php");

$descripcion=" 'Guernica' es una obra maestra del pintor español Pablo Picasso. Fue creado como una respuesta a los horrores de la Guerra Civil Española
 y el bombardeo de la ciudad vasca de Guernica durante ese conflicto. El cuadro representa el sufrimiento y la desesperación de las víctimas del bombardeo,
  con figuras distorsionadas y colores sombríos. Es una poderosa declaración contra la violencia y la guerra.";
$consulta="INSERT INTO cuadros (cuadro_id, titulo, fecha_creacion, tecnica, estilo, descripcion, autor_id, sala_id) VALUES
    (null, 'Guernica', '1937', 'Óleo sobre lienzo', 'Cubismo', '$descripcion', 0, 1);";

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
    echo "<br> CUADRO insertado"; 
}

$descripcion="'La Gioconda', también conocida como 'Mona Lisa', es una de las obras más famosas del genio renacentista Leonardo da Vinci. 
La pintura retrata a una mujer con una enigmática sonrisa, posiblemente Lisa Gherardini, esposa de Francesco del Giocondo. 
La obra se destaca por su técnica magistral, el uso del sfumato para crear transiciones suaves entre los colores y la expresión enigmática de la modelo. 
Es un ícono del arte y la cultura occidental.";
$consulta="INSERT INTO cuadros (cuadro_id, titulo, fecha_creacion, tecnica, estilo, descripcion, autor_id, sala_id) VALUES
    (null, 'La Gioconda', '1503', 'Pintura al óleo sobre tabla de álamo', 'Renacimiento', '$descripcion', 0, 1);";

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
    echo "<br> CUADRO insertado"; 
}
?>