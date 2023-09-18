CREATE SCHEMA IF NOT EXISTS pokedex;
USE pokedex;
CREATE TABLE pokemon(
                        id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
                        num_id INT,
                        imagen VARCHAR(50),
                        nombre VARCHAR(50),
                        tipo VARCHAR(50),
                        descripcion VARCHAR(50));
CREATE TABLE usuario(
    usuario VARCHAR(50) PRIMARY KEY NOT NULL,
    clave VARCHAR(50) NOT NULL
);
INSERT INTO `pokemon` (`id`, `num_id`, `imagen`, `nombre`, `tipo`, `descripcion`) VALUES
(1, 1, 'imagenes/ico_3ds_001', 'Bulbasaur', 'planta', '...'),
(2, 2, 'imagenes/ico_3ds_002', 'Ivysaur', 'planta', '...'),
(3, 3, 'imagenes/ico_3ds_003', 'Venusaur', 'planta', '...'),
(4, 4, 'imagenes/ico_3ds_004', 'Charmander', 'fuego', '...');

INSERT INTO `usuario` (`usuario`, `clave`) VALUES ('a', 'a');