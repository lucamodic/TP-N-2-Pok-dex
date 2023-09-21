<?php
    session_start();
    if (!isset($_SESSION["usuario"])) {
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
<header class="">
    <div class="container-fluid p-5 bg-dark text-white text-center header">
        <a href="index.php"><img width="210" src="imagenes/pokemonLogo.png" alt=""></a>
        <h1 class="titulo2">Pokedex</h1>
        <form action='<?php logout() ?>' method='POST' class='form'>
            <input class='btn btn-warning btn-sm boton' type='submit' name='Logout' value='Logout'>
        </form>
    </div>

    <div class="campos-ingresados">
    <?php
    $conexion = mysqli_connect("localhost", "root", "", "pokedex");
    if (isset($_POST["pokemon-editar"])) {
        $id=$_POST["id"];
        $num_id=$_POST["num_id"];
        $imagen=$_FILES["imagen"]["name"];
        $loc_temp=$_FILES["imagen"]["tmp_name"];
        $imagen_ruta="imagenes/".$imagen;
        move_uploaded_file($loc_temp, $imagen_ruta);
        $nombre=$_POST["nombre"];
        $tipo=$_POST["tipo"];
        $tipo_ruta="imagenes/".$tipo.".png";
        $descripcion=$_POST["descripcion"];
        $ids="SELECT num_id FROM pokemon WHERE num_id='$num_id'";
        $resultado_ids=$conexion->query($ids);
        $editar="";

        if(!empty($imagen)){
            $editar="UPDATE pokemon SET imagen='$imagen_ruta' WHERE num_id=$id";
            $resultado2=$conexion->query($editar);
        }
        if(!empty($nombre)) {
            $editar = "UPDATE pokemon SET nombre='$nombre' WHERE num_id=$id";
            $resultado3=$conexion->query($editar);
        }
        if(!empty($tipo)){
            $editar = "UPDATE pokemon SET tipo='$tipo_ruta' WHERE num_id=$id";
            $resultado4=$conexion->query($editar);
        }
        if(!empty($descripcion)){
            $editar= "UPDATE pokemon SET descripcion='$descripcion' WHERE num_id=$id";
            $resultado5=$conexion->query($editar);
        }
        if(!empty($num_id)){
            if (!is_numeric($num_id)){

                echo "<h2>El id debe ser numérico.</h2>";

            } elseif (!$resultado_ids->num_rows == 0) {
                echo "<h2>El id ya existe.</h2>";
            }else{
                $editar="UPDATE pokemon SET num_id='$num_id' WHERE num_id=$id";
                $resultado1=$conexion->query($editar);
            }
        }
        if (!empty($editar)) {
            $fin=header("Location: homeAdmin.php"); exit();
        }
    }
    ?>

    <a href="index.php"> <button class='btn btn-primary' id="volver">VOLVER </button></a>
    </div>
</body>
</html>