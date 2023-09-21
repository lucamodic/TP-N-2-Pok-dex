<?php
$config = parse_ini_file('config.ini', true);

$servername = 'localhost';
$username = 'root';
$password = $config['clave'];
$database = 'pokedex';

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE SCHEMA IF NOT EXISTS pokedex";
$conn->query($sql);

$sql = "USE pokedex";
$conn->query($sql);

$sql = "CREATE TABLE IF NOT EXISTS usuario (
    id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    usuario VARCHAR(256),
    clave VARCHAR(256)
)";
$conn->query($sql);

$sql = "CREATE TABLE IF NOT EXISTS pokemon (
    id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    num_id INT,
    imagen VARCHAR(50),
    nombre VARCHAR(50),
    tipo VARCHAR(50),
    descripcion VARCHAR(50)
)";
$conn->query($sql);

$sql = "INSERT INTO pokemon (id, num_id, imagen, nombre, tipo, descripcion) VALUES
    (1, 1, 'imagenes/bulbasaur.gif', 'Bulbasaur', 'imagenes/planta.png', '...'),
    (2, 2, 'imagenes/ivysaur.gif', 'Ivysaur', 'imagenes/planta.png', '...'),
    (3, 3, 'imagenes/venusaur.gif', 'Venusaur', 'imagenes/planta.png', '...'),
    (4, 4, 'imagenes/charmander.gif', 'Charmander', 'imagenes/fuego.png', '...')";
$conn->query($sql);

$sql = "INSERT INTO usuario (usuario, clave) VALUES ('admin', 'admin')";
$conn->query($sql);

$conn->close();

header("Location: index.php");
exit();
?>