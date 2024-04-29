# musartin
/*CREATE DATABASE if NOT EXISTS museo;
USE museo; 

CREATE TABLE IF NOT EXISTS Autores (
    autor_id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100),
    fecha_nacimiento DATE,
    nacionalidad VARCHAR(100)
);

CREATE TABLE IF NOT EXISTS Salas (
    sala_id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100),
    ubicacion VARCHAR(100),
    capacidad INT
);

CREATE TABLE IF NOT EXISTS Cuadros (
    cuadro_id INT PRIMARY KEY AUTO_INCREMENT,
    titulo VARCHAR(100),
    ano_creacion INT,
    tecnica VARCHAR(100),
    estilo VARCHAR(100),
    descripcion TEXT,
    autor_id INT,
    sala_id INT,
    FOREIGN KEY (autor_id) REFERENCES Autores(autor_id),
    FOREIGN KEY (sala_id) REFERENCES Salas(sala_id)
);
*/
