<?php
$config = parse_ini_file('config.ini', true);
$password = $config['clave'];
$conexion = mysqli_connect("localhost", "root", "$password", "pokedex")
or exit("No se pudo conectar a la base de datos");
    $sql = "INSERT INTO pokemon (num_id, imagen, nombre, tipo, descripcion)
    VALUES (1,'../imagenes/ico_3ds_001','Bulbasaur','planta','...')";
    $resultado=$conexion->query($sql);


mysqli_close($conexion);