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


    $publicaciones = "./CSV/publicaciones.csv";
    $usuarios = "./CSV/usuarios.csv";

    $datosUsuarios = array();
    $datosPublicaciones = array();
    $datosUsuarios = leerCSV($usuarios);
    $datosPublicaciones = leerCSV($publicaciones);

    for ($i = count($datosPublicaciones) - 1; $i > 0; $i--) {
        $publicacionarray = $datosPublicaciones[$i];
        $publicacion = new Publicacion($publicacionarray[0], $publicacionarray[1], $publicacionarray[2], $publicacionarray[3], $publicacionarray[4], $publicacionarray[5]);
        $booleano = $publicacion->publicado();
        if ($booleano == true) {
            $publicacion->imprimirPublicacion();
        }
    }

    ?>

</body>

</html>