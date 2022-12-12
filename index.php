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
    session_start();
    include "DAO.class.php";
    include "menu.php";
    $DAO = new DAO();
    $datosUsuarios = $DAO->devolverArrayUsuarios();
    $datosPublicaciones = $DAO->devolverArrayPublicaciones();

    for ($i = count($datosPublicaciones) - 1; $i > 0; $i--) {
        $booleano = $datosPublicaciones[$i]->publicado();
        if ($booleano == true) {
            $datosPublicaciones[$i]->imprimirPublicacion();
        }
    }

    ?>

</body>

</html>