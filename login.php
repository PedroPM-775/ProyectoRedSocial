<?php
/*

        Título: Tarefa 4 - 1

        Autor:Pedro Pina Menéndez

        Data modificación: 17/11/2022
        Versión 1.0

    */
include "DAO.php";
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="hojalogin.css">
</head>

<body>

    <?php

    $archivo = "usuarios.csv";
    $datos = array();
    $datos = leerCSV($archivo);
    $encontrado = false;
    //@ Compruebo si los datos estan en la base de datos
    if (isset($_POST['enviar'])) {

        $valido = true;

        if (isset($_POST['nome'])) {
            $nombre = $_POST['nome'];
            $nombretrim = trim($nombre);
            if (!preg_match("/^[a-zA-Z]+$/", $nombretrim)) {
                $valido = false;
            }
        }

        if (isset($_POST['contrasinal'])) {
            $contrasena = $_POST['contrasinal'];
            $nombretrim = trim($nombre);
            if (!preg_match('/[a-zA-Z0-9]+$/', $nombretrim)) {
                $valido = false;
            }
        }

        if ($valido) {
            $loop = false;
            $numfila;
            $nombre = trim($_POST['nome']);
            $password = trim($_POST['contrasinal']);
            $ps = crypt($password, "DmGx5dZx");
            while (!$loop) {
                for ($i = 1; $i < count($datos); $i++) {
                    $fila = $datos[$i];
                    if (hash_equals($nombre, $fila[8])) {
                        if (hash_equals($ps, $fila[1])) {
                            $encontrado = true;
                            $loop = true;
                            $numfila = $i;
                        }
                    }
                }
                $loop = true;
            }
        }
    }
    if ($encontrado) {
        //@ poner mensaje de error
        $fila = $datos[$numfila];
        //@ codigo de autenticacion y mandar a la pagina de usuarios.php
        session_start();
        $_SESSION['usuario'] = $nombre;
        $_SESSION['rol'] = $fila[11];
        if ($_SESSION['rol'] == 'Administrador') {
            header("Location: usuarios.php");
        } else {
            header("Location: comprobar.php");
        }
    }
    //@ Si no esta en la base de datos devuelve este error y vuelve a pedir datos
    else if (isset($_POST['enviar'])) {
        echo "<div id='contenedorerror'> 

        <p>Error, los datos introducidos no corresponden con la base de datos, por favor intentelo de nuevo </p>

        </div>";
        echo "<br>";
    }


    ?>


    <div id="fondo">
        <div id="contenedor">
            <form action="login.php" method="post" id="formulario">
                <p> Nombre de usuario: </p>
                <input type="text" name="nome" id="nome">
                <br> <br>
                <p> Contraseña </p>
                <input type="password" name="contrasinal" id="contrasinal">
                <br> <br>
                <button id="enviar" name="enviar" type="submit">LogIn</button>
                <p> Admin: PedroAdmin abcd12345</p>
                <p> Normal: pedropm becerrito</p>
            </form>
        </div>
    </div>
</body>


</html>