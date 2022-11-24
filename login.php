<?php
/*

        Título: Tarefa 4 - 1

        Autor:Pedro Pina Menéndez

        Data modificación: 17/11/2022
        Versión 1.0

    */
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

    //! Funcion para leer el archivo CSV
    function leerCSV($archivo)
    {
        $arrayDatos = array();
        if ($fp = fopen($archivo, "r")) {
            while ($filaDatos = fgetcsv($fp, 0, ",")) {
                $arrayDatos[] = $filaDatos;
            }
        } else {
            echo "Error, no se puede acceder al archivo " . $archivo . "<br>";
            return false;
        }
        fclose($fp);
        return $arrayDatos;
    }

    $datos = leerCSV($archivo);

    if (isset($_POST['enviar'])) {
        $encontrado = false;
        $loop = false;
        $numfila;
        $nombre = $_POST['nome'];
        $password = $_POST['contrasinal'];
        while (!$loop) {
            for ($i = 1; $i < count($datos); $i++) {
                $fila = $datos[$i];
                if ($nombre == $fila[8]) {
                    if ($password == $fila[1]) {
                        $encontrado = true;
                        $loop = true;
                        $numfila = $i;
                    }
                }
            }
            $loop = true;
        }
        if ($encontrado == false) {
            //@ poner mensaje de error
        } else {
            $fila = $datos[$numfila];
            if ($fila[11] == 'Administrador') {
                //@ codigo de autenticacion y mandar a la pagina de usuarios.php
                session_start();
                $_SESSION['usuario'] = $usuario;
                header("Location: usuarios.php");
            } else {
                //@ mensaje de relleno
            }
        }
    }

    ?>


    <div id="fondo">
        <div id="contenedor">
            <form action="login.php" method="post" id="formulario">
                <input type="text" name="nome" id="nome">
                <br> <br>

                <input type="password" name="contrasinal" id="contrasinal">
                <br> <br>
                <button id="enviar" name="enviar" type="submit">LogIn</button>
            </form>
        </div>
    </div>
</body>

</html>