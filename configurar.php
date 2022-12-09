<?php

include "DAO.class.php";
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
}
if ($_SESSION['rol'] != 'Administrador') {
    header("Location: index.php");
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

        $valor = $DAO->escribirCsvPalabras($arrayPalabras);

        header("location: index.php");
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
                                                                    for ($i = 0; $i < count($palabras); $i++) {
                                                                        echo $palabras[$i];
                                                                        echo ",";
                                                                    } ?></textarea>
            <input type="submit" value="guardar" name="guardar" />
        </form>
    </div>


</body>

</html>