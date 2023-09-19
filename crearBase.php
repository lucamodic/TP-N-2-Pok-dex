<?php
$config = parse_ini_file('config.ini', true);

$servername = 'localhost';
$username = 'root';
$password = $config['clave'];
$database = 'pokedex';

// Create a new database connection
$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create schema if not exists
$sql = "CREATE SCHEMA IF NOT EXISTS pokedex";
$conn->query($sql);

// Use the 'pokedex' schema
$sql = "USE pokedex";
$conn->query($sql);

// Create usuario table
$sql = "CREATE TABLE IF NOT EXISTS usuario (
    id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    usuario VARCHAR(256),
    clave VARCHAR(256)
)";
$conn->query($sql);

// Create pokemon table
$sql = "CREATE TABLE IF NOT EXISTS pokemon (
    id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    num_id INT,
    imagen VARCHAR(50),
    nombre VARCHAR(50),
    tipo VARCHAR(50),
    descripcion VARCHAR(50)
)";
$conn->query($sql);

// Insert data into the tables
$sql = "INSERT INTO pokemon (id, num_id, imagen, nombre, tipo, descripcion) VALUES
    (1, 1, 'imagenes/ico_3ds_001.png', 'Bulbasaur', 'imagenes/planta.png', '...'),
    (2, 2, 'imagenes/ico_3ds_002.png', 'Ivysaur', 'imagenes/planta.png', '...'),
    (3, 3, 'imagenes/ico_3ds_003.png', 'Venusaur', 'imagenes/planta.png', '...'),
    (4, 4, 'imagenes/ico_3ds_004.png', 'Charmander', 'imagenes/fuego.png', '...')";
$conn->query($sql);

// Insert data into the 'usuario' table
$sql = "INSERT INTO usuario (usuario, clave) VALUES ('admin', 'admin')";
$conn->query($sql);

// Close the database connection
$conn->close();

header("Location: index.php");
exit();
?>