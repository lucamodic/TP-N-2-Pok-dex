<?php
$conexion = mysqli_connect("localhost", "root", "123321", "pokedex")
or exit("No se pudo conectar a la base de datos");
$sql = "INSERT INTO pokemon (num_id, imagen, nombre, tipo, descripcion)
VALUES (1,'../imagenes/ico_3ds_001','Bulbasaur','planta','...')";



mysqli_close($conexion);