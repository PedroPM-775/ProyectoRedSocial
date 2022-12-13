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
if (!$usuario->Admin()) {
    die("Error, usuario sin permisos requeridos, por favor haga login <a href='login.php'>aqui</a>.<br />");
}



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
    <title>Configuracion</title>
</head>

<body>

    <?php
    //$ Esta pagina cambia los datos de la cookie "seguridad", asi como las palabras "censuradas"
    include "menu.php";
    if (isset($_POST['guardar'])) {
        unset($_COOKIE['seguridad']);

        if ($_POST['seguridad'] == "maxima") {
            setcookie('seguridad', '2');
        }
        if ($_POST['seguridad'] == "minima") {
            setcookie('seguridad', '1');
        }
        if ($_POST['seguridad'] == "nula") {
            setcookie('seguridad', '0');
        }
        $DAO = new DAO();
        $arrayPalabras = explode(",", $_POST['palabras']);

        //$ Escribo las palabras del csv de palabras censuradas en una funcion, y la paso a un textarea
        $valor = $DAO->escribirCsvPalabras($arrayPalabras);
    }
    ?>

    <div id="contenedorform">
        <form action="configurar.php" method="post">
            <label for="lang">Seguridad</label>
            <select name="seguridad" id="lang">
                <option value="maxima">Maxima</option>
                <option value="minima">Mínima</option>
                <option value="nula">Nula</option>
            </select> </br></br>
            <label for="lang">Añadir palabras prohibidas(separadas por comas, sin espacios)</label>
            <textarea name="palabras" id="lang" cols="30" rows="3"><?php
                                                                    $DAO = new DAO();
                                                                    $datos = $DAO->leerCsvPalabras();
                                                                    $palabras = $datos[0];
                                                                    for ($i = 0; $i < count($palabras) - 1; $i++) {
                                                                        echo $palabras[$i];
                                                                        echo ",";
                                                                    }
                                                                    echo $palabras[count($palabras) - 1];
                                                                    ?></textarea>
            <input type="submit" value="guardar" name="guardar" />
        </form>
    </div>


</body>

</html>