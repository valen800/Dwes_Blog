<?php 

    if (isset($_REQUEST['entrar'])) {
        session_start();
        if (isValidUser($_REQUEST['user'], $_REQUEST['password'])) {
            $_SESSION['auth'] = true;
            $_SESSION['info'] = 'Sesion inciada';
            unset($_SESSION['error']);
        } else {
            $_SESSION['auth'] = false;
            $_SESSION['error'] = 'Usuario o contraseña incorrecta';
            unset($_SESSION['info']);
            session_destroy();
        }
    } else if(isset($_SESSION['salir'])) {
        $_SESSION = array();
        session_destroy();
        session_start();
        $_SESSION['auth'] = false;
        $_SESSION['info'] = 'Sesion terminada';
    }
    
    header("Location: index.php");

    function isValidUser($user, $password) {
        if ($user == "admin" && $password == "admin123") {
            return true;
        }
        return false;
    }

?>