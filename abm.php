<?php
$conexion = mysqli_connect("localhost", "root", "", "pokedex")
or exit("No se pudo conectar a la base de datos");
$sql = "SELECT * FROM pokemon";
$resultado=$conexion->query($sql);

mysqli_close($conexion);