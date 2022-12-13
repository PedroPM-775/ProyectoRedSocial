<?php
/*

        Título: Tarefa 4 - 1

        Autor:Pedro Pina Menéndez

        Data modificación: 17/11/2022
        Versión 1.0

    */
// Recupérase a información da sesión
// Comprobase que o usuario se autenticou
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
    <title>Usuarios</title>
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
</head>

<body>
    <?php
    include "menu.php";
    $DAO = new DAO();
    $datos = $DAO->devolverArrayPublicaciones();


    //@ Codigo para comprobar si el formulario tiene errores y si ha sido enviado o si se ha accedido a la pagina
    ?>
    <table aria-describedby="Tabla rellena con datos de publicaciones.csv">
        <caption>Publicaciones en la base</caption>
        <tr>
            <th>Codigo</th>
            <th>Titulo</th>
            <th>Texto</th>
            <th>Multimedia</th>
            <th>dataPublicacion</th>
            <th>userName</th>
        </tr>

        <?php

        //@ Usando un bucle for dentro de otro, imprimo todos los elementos del archivo en distintas filas de la tabla


        for ($i = 1; $i < count($datos); $i++) {
            $publicacion = $datos[$i];
        ?>
            <tr>
                <td><?php echo $publicacion->getCodigo(); ?></td>
                <td><?php echo $publicacion->getTitulo(); ?></td>
                <td><?php echo $publicacion->getTexto(); ?></td>
                <td><?php echo $publicacion->getMultimedia(); ?></td>
                <td><?php echo $publicacion->getdataPublicacion(); ?></td>
                <td><?php echo $publicacion->getuserName(); ?></td>
                <?php echo "<td> <a href = 'borrarPublicacion.php?fila=$i'>Eliminar</a> </td>"; ?>
            </tr>

        <?php
        }
        ?>
    </table>
    </br>
    <a href="index.php">Volver a pagina principal</a>

</body>

</html>