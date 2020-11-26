<?php
    $file = $_GET['nombre'];
    $path = './posts/'.$file;

    unlink($path);
    header('location: index.php');
?>