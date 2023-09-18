<?php

session_start();

if (isset($_SESSION["usuario"])) {
    header("location:homeAdmin.php");
    exit();
}

$conexion = mysqli_connect("localhost", "root", "", "pokedex")
or exit("No se pudo conectar a la base de datos");

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
        <a href="home.php"><img width="210" src="/Pokedex/Images/pokemonLogo.png" alt=""></a>
        <h1 class="titulo">Pokedex</h1>
        <div class="form">
            <input  type="text" name="usuario" id="usuario" placeholder="Usuario">
            <input  type="password" name="pass" id="pass" placeholder="Password">
            <button type="button" class="btn btn-warning btn-sm boton">Login</button>
        </div>
    </div>
    <form action="buscarPokemon.php" method="GET" enctype="application/x-www-form-urlencoded">
        <div class="input-group mb-3 p-2 container">
            <input type="text" id ="nombre" name="nombre" class="form-control"  placeholder="Ingrese el nombre,tipo o número de pokémon" aria-label="Recipient's username" aria-describedby="basic-addon2">
            <input type="submit" value="Quien es este pokemon?" name="enviar" class="input-group-text" id="basic-addon2">
        </div>
    </form>
</header>
<?php
$busqueda = strtolower($_GET['nombre']);
if(empty($busqueda)){
    $sqlTodo = "SELECT * FROM pokemon";
    $resultado=$conexion->query($sqlTodo);
} else{

    $sql = "SELECT * FROM pokemon WHERE (nombre LIKE '%$busqueda%' OR 
                                         tipo LIKE '%$busqueda%' OR
                                        num_id LIKE '%$busqueda%')";


    $resultado = $conexion->query($sql);
    if ($resultado->num_rows === 0) {
        echo "<div class='container mt-3'>";
        echo "<h2>No se encontro Pokemon</h2>";
        echo "</div>";

        $sqlTodo = "SELECT * FROM pokemon";
        $resultado = $conexion->query($sqlTodo);
    }


}
?>

<div class="container mt-3">
    <table class="table">
        <thead class="table-dark">
        <tr>
            <th>Imagen</th>
            <th>Tipo</th>
            <th>Numero</th>
            <th>Nombre</th>
        </tr>
        </thead>
        <tbody>
        <?php
        while ($fila = mysqli_fetch_assoc($resultado)) {
            echo "<tr>";
            echo "<td><img src='{$fila['imagen']}' alt='{$fila['nombre']}'></td>";
            echo "<td><img src='{$fila['tipo']}' alt='{$fila['tipo']}'></td>";
            echo "<td>{$fila['num_id']}</td>";
            echo "<td>{$fila['nombre']}</td>";
            echo "</tr>";
        }
        mysqli_close($conexion);
        ?>
        </tbody>
    </table>

</div>

</body>
</html>

