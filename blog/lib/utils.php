<?php
    require_once 'lib/security.php';

    function setErrorMessage($message) {
        $_SESSION['error'] = $message;
    }

    function setInfoMessage($message) {
        $_SESSION['info'] = $message;
    }

    function isValidUser($user, $password) {
        if ($user == 'admin' && $password == 'admin123') {
            return true;
        }
        
        return false;
    }

    function getErrorMessage() {
        session_start();

        if (isset($_SESSION['error'])) {
            echo '<div class="alert alert-danger" role="alert">';
            echo $_SESSION['error'];
            echo '</div>';
            unset($_SESSION['error']);
        }
    }

    function getInfoMessage() {
        session_start();

        if (isset($_SESSION['info'])) {
            echo '<div class="alert alert-primary" role="alert">';
            echo $_SESSION['info'];
            echo '</div>';
            unset($_SESSION['info']);
        }
    }

    function getListPosts() {
        $path = "./posts";
        $ficheros = array_diff(scandir($path), array('..','.'));
        $result = '';
        $result .= '<ul>'.PHP_EOL;

        foreach ($ficheros as $key => $value) {
            $result .=  '<li>'.PHP_EOL;
            $result .= '<a href="verpost.php?nombre='.urldecode($value).'">'.$value.'</a>'.PHP_EOL;
            if (isAllowed()) {
                $result .= '<a href="borrar.php?nombre='.urldecode($value).'""> Borrar </a>'.PHP_EOL;
                $result .= '<a href="editar.php?nombre='.urldecode($value).'""> Editar </a>'.PHP_EOL;
            }
            $result .= '</li>'.PHP_EOL;
        }

        $result .= '</ul>'.PHP_EOL;

        return $result;
    }

    function getPostHTML() {
        $file = $_GET['nombre'];
        $path = './posts/'.$file;
        $contenido = file_get_contents($path);
        $result = '';

        $result .= '<h1>Nombre del POST: '.$file.'</h1>'.PHP_EOL;

        $result .= '<p>Contenido: '.$contenido.'</p>'.PHP_EOL;

        return $result;
    }

    function deletePost() {
        $file = $_GET['nombre'];
        $path = './posts/'.$file;

        unlink($path);
        header('location: index.php');
    }

    function getDescription($file) {
        $path = './posts/'.$file;
        $contenido = file_get_contents($path);

        return $contenido;
    }
?>