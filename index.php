<?php
    session_start();

    if(isset($_SESSION["usuario"]) ){
        header("location:index-admin.php");
        exit();
    }

    function incorrecto(){
        if(isset($_COOKIE['incorrecto'])){
            echo "<h1>Usuario o contraseña incorrectos</h1>";
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

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="estilos.css">
    <title>Document</title>
</head>
<body>

    <form action="validar-login.php" method="POST">

        <input class="<?php usuario_vacio() ?> input-login" type="text" name="usuario" id="usuario">
        <input class="<?php contra_vacia() ?> input-login" type="password" name="clave" id="clave">
        <input type="submit" value="enviar">
        <?php
            incorrecto();
        ?>
    </form>

</body>
</html>