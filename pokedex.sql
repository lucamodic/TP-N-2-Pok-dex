CREATE SCHEMA IF NOT EXISTS pokedex;
USE pokedex;
CREATE TABLE pokemon(
    id INT AUTO_INCREMENT PRIMARY KEY NOT NULL UNIQUE,
    num_id INT,
    imagen VARCHAR(50),
    nombre VARCHAR(50),
    tipo VARCHAR(50),
    descripcion VARCHAR(50));
