<?php

/*

        Título: Tarefa 5 - 2

        Autor:Pedro Pina Menéndez

        Data modificación: 13/12/2022
        Versión 1.0

    */

include "DAO.class.php";
session_start();
// Comprobase que o usuario se autenticou
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
}
$usuario = unserialize($_SESSION['usuario']);




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/hoja<?php

                                            if (isset($_COOKIE['tema'])) {
                                                echo $_COOKIE['tema'];
                                            } else {
                                                echo "Clara";
                                            } ?>.css">


    <style>
        body {
            font-size: <?php if (isset($_COOKIE['tamano'])) {
                            echo $_COOKIE['tamano'];
                        } else {
                            echo "14";
                        } ?>px;
            font-family: <?php if (isset($_COOKIE['fuente'])) {
                                echo $_COOKIE['fuente'];
                            } else {
                                echo "calibri";
                            } ?>;
        }
    </style>
    <title>Pagina Principal</title>

</head>

<body>
    <?php
    include "menu.php";
    $DAO = new DAO();
    $datosUsuarios = $DAO->devolverArrayUsuarios();
    $datosPublicaciones = $DAO->devolverArrayPublicaciones();

    for ($i = count($datosPublicaciones) - 1; $i > 0; $i--) {
        //$ Primero comrpruebo si la hora de publicacion ha llegado ya, utilizando un metodo de la clase Publicacion
        $booleano = $datosPublicaciones[$i]->publicado();
        //$ En caso de que asi sea, lo imprimo usando esta funcion.
        if ($booleano == true) {

            echo " <div class = 'cajapost'>
            <img class ='imagenpost' src='";
            $nombrefoto = "fotos/foto_" . $datosPublicaciones[$i]->getuserName() . ".jpg";
            if (file_exists($nombrefoto)) {
                echo $nombrefoto;
            } else {
                echo "fotos/default.png";
            }
            echo "'> <a id='nombreusuario'>";
            echo $datosPublicaciones[$i]->getuserName();
            echo "</a>
                <h3 class ='titulo'>";
            echo $datosPublicaciones[$i]->getTitulo();
            echo "</h3>
                 <p class ='contenido'>";
            echo $datosPublicaciones[$i]->getTexto();
            echo "</p>";
            echo "<img class = 'imagen' src ='";
            $foto = "multimediaPublicaciones/" . $datosPublicaciones[$i]->getCodigo() . ".jpg";
            if (file_exists($foto)) {
                echo $foto . "'>";
            } else {
                echo "fotos/default.png' style = 'display:none' >";
            }
            echo "</div>";
        }
    }

    ?>

</body>

</html>