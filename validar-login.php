<?php

    session_start();

    $config = parse_ini_file('config.ini', true);


    $servername = 'localhost';
    $username = 'root';
    $password = $config['clave'];
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
        header("location:homeAdmin.php");
        exit();
    } else {
        header("Location: index.php");
        exit();
    }


    function validar($usuario, $clave, $resultado){
        user_vacio($usuario);
        pass_vacia($clave);
        if(user_vacio($usuario) && pass_vacia($clave)){
            validar_nombre($usuario, $resultado);
            validar_clave($clave, $resultado);
            return validar_nombre($usuario, $resultado) && validar_clave($clave, $resultado);
        }
        return false;
    }

    function validar_nombre($usuario, $resultado){
        foreach($resultado as $elem){
            if($elem['usuario'] == $usuario){
                return true;
            }
        }
        setcookie("incorrecto", "incorrecto", time()+1600);
        return false;
    }

    function validar_clave($clave, $resultado){
        foreach($resultado as $elem){
            if($elem['clave'] == $clave){
                return true;
            }
        }
        setcookie("incorrecto", "incorrecto", time()+1600);
        if(isset($_COOKIE['user_vacio'])){
            setcookie("user_vacio", "", time()-3600);
        }
        if(isset($_COOKIE['pass_vacia'])){
            setcookie("pass_vacia", "", time()-3600);
        }
        return false;
    }

    function pass_vacia($clave){
        if($clave == ""){
            setcookie("pass_vacia", "pass_vacia", time()+1600);
            if(isset($_COOKIE['user_vacio'])){
                setcookie("user_vacio", "", time()-3600);
            }
            if(isset($_COOKIE['incorrecto'])){
                setcookie("incorrecto", "", time()-3600);
            }
            return false;
        }
        return true;
    }

    function user_vacio($usuario){
        if($usuario == ""){
            setcookie("user_vacio", "user_vacio", time()+1600);
            if(isset($_COOKIE['pass_vacia'])){
                setcookie("pass_vacia", "", time()-3600);
            }
            if(isset($_COOKIE['incorrecto'])){
                setcookie("incorrecto", "", time()-3600);
            }
            return false;
        }
        return true;
    }


    $conn->close();

?>