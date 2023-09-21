<?php
    session_start();

    if(!isset($_SESSION["usuario"]) ){
        header("location:index.php");
        exit();
    }

    function logout(){
        if (isset($_POST["Logout"])) {
            unset($_SESSION["usuario"]);
            header("location:index.php");
            exit();
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
<header>
    <div class="container-fluid p-5 bg-dark text-white text-center header">
        <a href="index.php"><img width="210" src="imagenes/pokemonLogo.png" alt=""></a>
        <h1 class="titulo2">Pokedex</h1>
                    <form action='<?php logout() ?>' method='POST' class='form'>
                        <input class='btn btn-warning btn-sm boton' type='submit' name='Logout' value='Logout'>
                    </form>
    </div>
    <form  action="buscarPokemon.php" method="GET" enctype="application/x-www-form-urlencoded">
        <div class="input-group mb-3 p-2 container">
            <input type="text" id ="nombre" name="nombre" class="form-control" placeholder="Ingrese el nombre, tipo o número de pokémon" aria-label="Recipient's username" aria-describedby="basic-addon2">
            <input type="submit" value="Quién es este pokemon?" class="input-group-text" id="basic-addon2">
        </div>
    </form>
</header>
<?php
$conexion = mysqli_connect("localhost", "root", "", "pokedex")
or exit("No se pudo conectar a la base de datos");
$sql="SELECT * FROM pokemon";
$resultado=$conexion->query($sql);
?>
<div class="container mt-3">
    <div class="table-container">
    <table class="table">

        <?php
        if(isset($_POST['editar'])) {
            $id=$_POST['pokemon-id'];
            $select="SELECT * FROM pokemon WHERE num_id = $id";
            $resultado=$conexion->query($select);
            $fila=mysqli_fetch_assoc($resultado);
            echo "<thead class='table-dark'>
                    <tr>
                        <th>Imagen</th>
                        <th>Tipo</th>
                        <th>Numero</th>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>";
            echo "<tr>";
            echo "<td><img src='{$fila['imagen']}' alt='{$fila['nombre']}'></td>";
            echo "<td class='td'><img src='{$fila['tipo']}' alt='{$fila['tipo']}'></td>";
            echo "<td class='td'>{$fila['num_id']}</td>";
            echo "<td class='td'>{$fila['nombre']}</td>";
            echo "<td class='td'>{$fila['descripcion']}</td><td></td></tr>";
            echo "<tr>";
            echo "<form action='editarPokemon.php' method='post' enctype='multipart/form-data'>";
            echo "<input type='hidden' name='pokemon-editar'>";
            echo "<input type='hidden' name='id' value='$id'>";
            echo "<td><input type='file' name='imagen' placeholder='ingresar imagen'></td>";
            echo " <td><select name='tipo'>
                        <option value=''>Seleccioná...</option>
                        <option value='acero'>Acero</option>
                        <option value='agua'>Agua</option>
                        <option value='bicho'>Bicho</option>
                        <option value='dragon'>Dragón</option>
                        <option value='electrico'>Eléctrico</option>
                        <option value='fuego'>Fuego</option>
                        <option value='fantasma'>Fantasma</option>
                        <option value='hada'>Hada</option>
                        <option value='hielo'>Hielo</option>
                        <option value='lucha'>Lucha</option>
                        <option value='normal'>Normal</option>
                        <option value='planta'>Planta</option>
                        <option value='psiquico'>Psíquico</option>
                        <option value='roca'>Roca</option>
                        <option value='siniestro'>Siniestro</option>
                        <option value='tierra'>Tierra</option>
                        <option value='veneno'>Veneno</option>
                        <option value='volador'>Volador</option>
                    </select></td>";
            echo "<td><input type='text' name='num_id' placeholder='ingresar id'></td>";
            echo "<td><input type='text' name='nombre' placeholder='ingresar nombre'></td>";
            echo "<td><input type='text' name='descripcion' placeholder='descripcion'></td>";
            echo "<td><button type='submit' class='btn btn-primary' name='alta'>Editar</button></td>";
            echo "</form>";
            echo "</tr>";
        mysqli_close($conexion);
        } elseif (isset($_POST['baja'])) {
            $id = $_POST['pokemon-id'];
            $eliminado = "DELETE FROM pokemon WHERE num_id=$id";
            if (mysqli_query($conexion, $eliminado)) {echo "<h2>POKEMON ELIMINADO</h2>";
               echo "<a href='index.php'> <button class='btn btn-primary' id='volver'>VOLVER </button></a>";}
        } elseif (isset($_POST['alta'])) {
           echo "<thead class='table-dark'>
                    <tr>
                        <th>Imagen</th>
                        <th>Tipo</th>
                        <th>Numero</th>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>";
           echo "<tr>";
           echo "<form action='altaPokemon.php' method='post' enctype='multipart/form-data'>";
               echo "<input type='hidden' name='pokemon-agregar'>";
               echo "<td><input type='file' name='imagen' placeholder='ingresar imagen'></td>";
               echo " <td><select name='tipo'>
                        <option value='acero'>Acero</option>
                        <option value='agua'>Agua</option>
                        <option value='bicho'>Bicho</option>
                        <option value='dragon'>Dragón</option>
                        <option value='electrico'>Eléctrico</option>
                        <option value='fuego'>Fuego</option>
                        <option value='fantasma'>Fantasma</option>
                        <option value='hada'>Hada</option>
                        <option value='hielo'>Hielo</option>
                        <option value='lucha'>Lucha</option>
                        <option value='normal'>Normal</option>
                        <option value='planta'>Planta</option>
                        <option value='psiquico'>Psíquico</option>
                        <option value='roca'>Roca</option>
                        <option value='siniestro'>Siniestro</option>
                        <option value='tierra'>Tierra</option>
                        <option value='veneno'>Veneno</option>
                        <option value='volador'>Volador</option>
                    </select></td>";
               echo "<td ><input type='text' name='num_id' placeholder='ingresar id'></td>";
               echo "<td><input type='text' name='nombre' placeholder='ingresar nombre'></td>";
               echo "<td><input type='text' name='descripcion' placeholder='descripcion'></td>";
               echo "<td><button type='submit' class='btn btn-primary' name='alta'>Agregar</button></td>";
           echo "</form>";
           echo "</tr>";

        mysqli_close($conexion);}
        ?>
        </tbody>
    </table>
    </div>
</div>

</body>

