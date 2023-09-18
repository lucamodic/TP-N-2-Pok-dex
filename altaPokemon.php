<?php
session_start();

if(isset($_SESSION["usuario"]) ){
    header("location:homeAdmin.php");
    exit();
}

function incorrecto(){
    if(isset($_COOKIE['incorrecto'])){
        echo "<h5>Usuario o contraseña incorrectos</h5>";
    }
}

function contra_vacia(){
    if(isset($_COOKIE['pass_vacia'])){
        echo "pass";
    }
}

function usuario_vacio(){
    if(isset($_COOKIE['user_vacio'])){
        echo "user";
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Pokedex</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="home.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="fondo">
<header class="">
    <div class="container-fluid p-5 bg-dark text-white text-center d-flex">
        <a href="home.php"><img width="210" src="imagenes/pokemonLogo.png" alt=""></a>
        <h1 class="titulo">Pokedex</h1>
        <form action="validar-login.php" method="POST" class="form">
            <input class="<?php usuario_vacio() ?>" type="text" name="usuario" id="usuario" placeholder="Usuario">
            <input class="<?php contra_vacia() ?>" type="password" name="clave" id="pass" placeholder="Password">
            <input type="submit" class="btn btn-warning btn-sm boton" value="Login">
        </form>
    </div>
    <?php
    incorrecto();
    $conexion = mysqli_connect("localhost", "root", "", "pokedex");
    if (isset($_POST["pokemon-agregar"])) {
        $num_id = $_POST["num_id"];
        $imagen = $_POST["imagen"];
        $nombre = $_POST["nombre"];
        $tipo = $_POST["tipo"];
        $descripcion = $_POST["descripcion"];
        $agregar="INSERT INTO pokemon (num_id, imagen, nombre, tipo, descripcion)
        VALUES ('$num_id', '$imagen', '$nombre', '$tipo', '$descripcion')";
    if ($conexion->query($agregar)) {echo "POKEMON AGREGADO";}
    else {echo "PASÓ ALGO MALO:" . $conexion->error;}}
    ?>


</body>
</html>
