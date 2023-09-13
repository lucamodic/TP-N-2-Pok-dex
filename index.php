<?php
    session_start();
    if(isset($_SESSION["usuario"]) ){
        header("location:index-admin.php");
        exit();
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

        <input class="<?php
        if(isset($_GET['error'])){
            $error = $_GET['error'];
            if(strlen($error)>1){
                echo "error";
            }
        }
        ?>" type="text" name="usuario" id="usuario">
        <input class="<?php
        if(isset($_GET['error'])){
            $error = $_GET['error'];
            if(strlen($error)>1){
                echo "error";
            }
        }
        ?>" type="password" name="clave" id="clave">
        <input type="submit" value="enviar">

    </form>

</body>
</html>