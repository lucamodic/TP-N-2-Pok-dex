<?php

    session_start();

    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'pokedex';

    // Create a new database connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check for connection errors
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM usuario";
    $result = $conn->query($sql);
    $resultado = $result->fetch_all(MYSQLI_ASSOC);

    $usuario = isset( $_POST["usuario"])?$_POST["usuario"] : "";
    $clave = isset( $_POST["clave"])?$_POST["clave"] : "";

    if (validar($usuario, $clave, $resultado)){
        $_SESSION["usuario"] = $usuario;
        header("location:index-admin.php");
        exit();
    } else {
        $error = "error";
        header("Location: index.php?error=" . $error . ".php");
        exit();
    }



    function validar($usuario, $clave, $resultado){
        return validar_nombre($usuario, $resultado) && validar_clave($clave, $resultado);
    }

    function validar_nombre($usuario, $resultado){
        foreach($resultado as $elem){
            if($elem['usuario'] == $usuario){
                return true;
            }
        }
        return false;
    }

    function validar_clave($clave, $resultado){
        foreach($resultado as $elem){
            if($elem['clave'] == $clave){
                return true;
            }
        }
        return false;
    }


    $conn->close();

?>