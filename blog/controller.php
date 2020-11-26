<?php 

    if (isset($_GET['entrar'])) {
        if (checkUser()) {
            session_start();
        } else {
            echo "Error de sesion";
        }
    } else {
        header("Location: index.php");
    }

    function checkUser($user, $password) {

    }

?>