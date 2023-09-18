<?php
    session_start();

    if(!isset($_SESSION["usuario"]) ){
        header("location:home.php");
        exit();
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
<header>
    <div class="container-fluid p-5 bg-dark text-white text-center d-flex">
        <a href="home.php"><img width="210" src="imagenes/pokemonLogo.png" alt=""></a>
        <h1 class="titulo">Pokedex</h1>
    </div>
    <form  action="buscarPokemon.php" method="GET" enctype="application/x-www-form-urlencoded">
        <div class="input-group mb-3 p-2 container">
            <input type="text" id ="nombre" name="nombre" class="form-control" placeholder="Ingrese el nombre,tipo o número de pokémon" aria-label="Recipient's username" aria-describedby="basic-addon2">
            <input type="submit" value="Quién es este pokemon?" class="input-group-text" id="basic-addon2">
        </div>
    </form>
</header>
<?php
$conexion = mysqli_connect("localhost", "root", "", "pokedex")
or exit("No se pudo conectar a la base de datos");
$sql = "SELECT * FROM pokemon";
$resultado=$conexion->query($sql);
?>
<div class="container mt-3">
    <table class="table">
        <thead class="table-dark">
        <tr>
            <th>Imagen</th>
            <th>Tipo</th>
            <th>Numero</th>
            <th>Nombre</th>
            <th>Descripcion</th>
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
            echo "<form action='editarAdmin.php' method='post' >";
            echo "<input type='hidden' name='pokemon-id' value={$fila['num_id']}>";
            echo "<td><button type='submit' class='btn btn-primary' name='editar'>Editar</button>  
            <button type='submit' class='btn btn-danger' name='baja'>Baja</button>";
            echo "";
        }
        mysqli_close($conexion);
        ?>
        </tr>
        </tbody>
        <button type='submit' class='btn btn-primary' name='alta'>Agregar Pokemon</button></td>
        </form>
    </table>

</div>

</body>

