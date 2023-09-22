<?php

    session_start();
    if (isset($_POST["Logout"])) {
        unset($_SESSION["usuario"]);
        header("location:index.php");
        exit();
    }
?>