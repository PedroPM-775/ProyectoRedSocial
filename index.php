<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="hojaform.css">
    <title>Pagina Principal</title>

</head>

<body>
    <?php
    session_start();
    include "DAO.php";
    include "menu.php";
    include "Publicacion.class.php";


    $publicaciones = "publicaciones.csv";
    $usuarios = "usuarios.csv";

    $datosUsuarios = array();
    $datosPublicaciones = array();
    $datosUsuarios = leerCSV($usuarios);
    $datosPublicaciones = leerCSV($publicaciones);

    $ejemplo = new Publicacion("a", "a", "a", "a", "a");

    for ($i = 0; $i < 4; $i++) {
        $ejemplo->imprimirPublicacion();
    }


    ?>

</body>

</html>