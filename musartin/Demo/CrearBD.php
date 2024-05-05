<?php
// Configuración de la conexión a la base de datos
$servidor = "localhost";
$usuario = "root";
$clave = "";

// Conexión a MySQL
$mysqli = new mysqli($servidor, $usuario, $clave);

// Verificar errores de conexión
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: " . $mysqli->connect_error . " " . $mysqli->connect_errno;
    die("<br> Salida del programa. Fatal Error");
}

// Nombre de la base de datos
$basedatos = "musartin";

$resultado = $mysqli->query("SHOW DATABASES LIKE '$basedatos'");
if ($resultado->num_rows == 1) {
    echo "No se puede crear la base de datos, ya existe.";
} else {
    // Secuencia SQL para crear la base de datos, tablas e insertar datos
    $sql = "
        CREATE DATABASE IF NOT EXISTS musartin;
        USE musartin;

        CREATE TABLE IF NOT EXISTS autores (
            autor_id INT PRIMARY KEY AUTO_INCREMENT,
            nombre VARCHAR(100),
            fecha_nacimiento DATE,
            nacionalidad VARCHAR(100)
        );

        CREATE TABLE IF NOT EXISTS salas (
            sala_id INT PRIMARY KEY AUTO_INCREMENT,
            nombre VARCHAR(100),
            ubicacion VARCHAR(100),
            maximo_cuadros INT,
            cuadros_actuales INT DEFAULT 0
        );

        CREATE TABLE IF NOT EXISTS cuadros (
            cuadro_id INT PRIMARY KEY AUTO_INCREMENT,
            titulo VARCHAR(100),
            fecha_creacion int,
            tecnica VARCHAR(100),
            estilo VARCHAR(100),
            descripcion TEXT,
            autor_id INT DEFAULT 1,
            sala_id INT DEFAULT 1,
            FOREIGN KEY (autor_id) REFERENCES autores(autor_id) ON DELETE CASCADE,
            FOREIGN KEY (sala_id) REFERENCES salas(sala_id)
        );

        CREATE TRIGGER actualizar_capacidad_sala
        AFTER INSERT ON cuadros
        FOR EACH ROW
        BEGIN
            UPDATE salas
            SET cuadros_actuales = (
                SELECT COUNT(*) FROM cuadros WHERE sala_id = NEW.sala_id
            )
            WHERE sala_id = NEW.sala_id;
        END;
        
        CREATE TRIGGER actualizar_capacidad_sala_delete
        AFTER DELETE ON cuadros
        FOR EACH ROW
        BEGIN
            UPDATE salas
            SET cuadros_actuales = (
                SELECT COUNT(*) FROM cuadros WHERE sala_id = OLD.sala_id
            )
            WHERE sala_id = OLD.sala_id;
        END;
        

        CREATE TRIGGER before_delete_sala
    BEFORE DELETE ON salas
    FOR EACH ROW
    BEGIN
        UPDATE cuadros
        SET sala_id = 1
        WHERE sala_id = OLD.sala_id;
    END;

    CREATE TRIGGER before_delete_autores
    BEFORE DELETE ON autores
    FOR EACH ROW
    BEGIN
        UPDATE cuadros
        SET autor_id = 1
        WHERE autor_id = OLD.autor_id;
    END;

        INSERT INTO autores (autor_id, nombre, fecha_nacimiento, nacionalidad) VALUES
            (null, 'Desconocido', '0000-00-00', 'Desconocida'),
            (null, 'Pablo Picasso', '1881-10-25', 'España'),
            (null, 'Leonardo Da Vinci', '1452-04-15', 'Italia');

        INSERT INTO salas (sala_id, nombre, ubicacion, maximo_cuadros) VALUES
            (1, 'Almacén', 'Almacén', 1000),
            (null, 'Espacio renacentista', 'Piso 1 Sala A', 5),
            (null, 'Habitación Surrealista', 'Piso 2 Sala B', 7);

        INSERT INTO cuadros (cuadro_id, titulo, fecha_creacion, tecnica, estilo, descripcion, autor_id, sala_id) VALUES
            (null, 'La Última Cena', 1498, 'Fresco', 'Renacimiento', 'La Última Cena es una de las obras más conocidas del artista renacentista Leonardo da Vinci...', 3, 2),
            (null, 'Guernica', 1937, 'Óleo sobre lienzo', 'Cubismo', 'Guernica es una obra maestra del pintor español Pablo Picasso...', 2, 2),
            (null, 'La Gioconda', 1503, 'Pintura al óleo sobre tabla de álamo', 'Renacimiento', 'La Gioconda, también conocida como Mona Lisa, es una de las obras más famosas...', 3, 3);
    ";

    // Ejecutar la secuencia SQL
    if ($mysqli->multi_query($sql)) {
        do {
            // Recoger el primer conjunto de resultados
            if ($result = $mysqli->store_result()) {
                $result->free(); // Liberar el conjunto de resultados
            }
        } while ($mysqli->more_results() && $mysqli->next_result());

        echo "Todas las operaciones se han completado exitosamente.";
    } else {
        echo "Error en la ejecución de la consulta: " . $mysqli->error;
    }
}

// Cerrar la conexión a MySQL
$mysqli->close();
echo "<br> <a href='../CrearBorrar.php'>Volver</a>";
?>
