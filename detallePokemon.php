<?php

$numero = $_GET['numero'];
$config = parse_ini_file('config.ini', true);


$servername = 'localhost';
$username = 'root';
$password = $config['clave'];
$database = 'pokedex';

// Create a new database connection
$conn = new mysqli($servername, $username, $password, $database);

$sql = "SELECT * FROM pokemon WHERE id=$numero";

$resultados = $conn->query($sql);

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
        <a href="index.php"><img width="210" src="imagenes/pokemonLogo.png" alt=""></a>
        <h1 class="titulo">Pokedex</h1>
        <form action="validar-login.php" method="POST" class="form">
            <input class="<?php usuario_vacio() ?>" type="text" name="usuario" id="usuario" placeholder="Usuario">
            <input class="<?php contra_vacia() ?>" type="password" name="clave" id="pass" placeholder="Password">
            <input type="submit" class="btn btn-warning btn-sm boton" value="Login">
        </form>
    </div>
    <?php
    incorrecto();
    ?>
    <form action="buscarPokemon.php" method="GET" enctype="application/x-www-form-urlencoded">
        <div class="input-group mb-3 p-2 container">
            <input type="text" id ="nombre" name="nombre" class="form-control" placeholder="Ingrese el nombre, tipo o número de pokémon" aria-label="Recipient's username" aria-describedby="basic-addon2">
            <input type="submit" value="Quién es este pokemon?" class="input-group-text" id="basic-addon2">
        </div>
    </form>
</header>
<main>
    <section class="container">
        <div class="row p-4 bg-light">
            <?php
            echo '
                    <article class="col-12 col-md-4 d-flex justify-content-center">
                        <figure class="m-auto">
                            <img  width="230" height="230" src="imagenes/' . $resultados[0]["imagen"] . '">
                        </figure>
                    </article>
                    <article class="col-12 col-md-8">
                        <div class="p-2">
                            <figure class="d-inline">
                                <img width="50" height="50" src="imagenes/' . $resultados[0]["tipo"] . '">
                            </figure>                            
                            <h2 class="d-inline align-middle ms-3">'.$resultados[0]["nombre"].'</h2>
                        </div>
                        <div class="p-2 py-3">
                            <p>'.$resultados[0]["descripcion"].'</p>
                        </div>
                    </article>'
            ?>
        </div>

        <div class="text-center my-4">
            <a class="btn btn-dark" href="index.php">Volver</a>
        </div>
    </section>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>