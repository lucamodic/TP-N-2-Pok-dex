<?php
session_start();

if(isset($_SESSION["usuario"]) ){
    header("location:homeAdmin.php");
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

        <?php
        if (isset($_POST['editar'])) {
            $id = $_POST['pokemon-id'];

        } elseif (isset($_POST['baja'])) {
            $id = $_POST['pokemon-id'];
            $eliminado = "DELETE FROM pokemon WHERE num_id=$id";
            if (mysqli_query($conexion, $eliminado)) {echo "<h2>POKEMON ELIMINADO</h2>";}
        } elseif (isset($_POST['alta'])) {
           echo "<thead class='table-dark'>
                    <tr>
                        <th>Imagen</th>
                        <th>Tipo</th>
                        <th>Numero</th>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                    </tr>
                    </thead>
                    <tbody>";
           echo "<tr>";
           echo "<form action='altaPokemon.php' method='post' >";
           echo "<input type='hidden' name='pokemon-agregar'>";
           echo "<td><input type='text' name='num_id' placeholder='ingresar id'></td>";
           echo "<td><input type='text' name='imagen' placeholder='ingresar imagen'></td>";  //ESTO HAY QUE CAMBIARLO PARA ACEPTAR IMAGEN
           echo "<td><input type='text' name='nombre' placeholder='ingresar nombre'></td>";
           echo "<td><input type='text' name='tipo' placeholder='tipo'></td>";
           echo "<td><input type='text' name='descripcion' placeholder='descripcion'></td>";
           echo "<td><button type='submit' class='btn btn-primary' name='alta'>Agregar</button></td>";
           echo "</form>";
           echo "</tr>";
        };
        mysqli_close($conexion);
        ?>
        </tbody>
    </table>

</div>

</body>

