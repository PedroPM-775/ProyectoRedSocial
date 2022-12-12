<?php
/*

        Título: Tarefa 4 - 1

        Autor:Pedro Pina Menéndez

        Data modificación: 17/11/2022
        Versión 1.0

    */

include "DAO.class.php";

//@ Recupérase a información da sesión
session_start();
//@ Comprobase que o usuario se autenticou
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
}
if ($_SESSION['rol'] != 'Administrador') {
    die("Error, usuario sin permisos requeridos, por favor haga login <a href='login.php'>aqui</a>.<br />");
}
$DAO = new DAO();
$datos = $DAO->devolverArrayPublicaciones();
//@ Se coge la fila del enlace, si no se ha enviado se da un error y un enlace para volver a la pagina de usuario
if (isset($_GET['fila'])) {

    $fila = $_GET['fila'];
    if ($fila > 0 && $fila < count($datos)) {
        unset($datos[$fila]);
        $datosfinal = array_values($datos);
        $DAO->escribirArrayPublicaciones($datosfinal);
        header("Location: publicaciones.php");
    } else {
        echo "Ha habido un error, <a href='publicaciones.php'>pulse en este enlace para volver al perfil de usuario </a>";
    }
} else {
    echo "Ha habido un error, <a href='publicaciones.php'>pulse en este enlace para volver al perfil de usuario </a>";
}
