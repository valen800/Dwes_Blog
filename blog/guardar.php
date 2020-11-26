<?php
    $titulo = $_POST['title'];
    $description = $_POST['description'];
    $path = "./posts/$titulo";

    $data = $description;

    if (file_put_contents($path, $data)) {
        log("Guardado");
        header('location: index.php');
    } else {
        log("No guardado");
        header('location: noguardado.php');
    }
?>