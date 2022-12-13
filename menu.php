<?php /*

Título: Tarefa 5 - 2

Autor:Pedro Pina Menéndez

Data modificación: 13/12/2022
Versión 1.0

*/
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="./CSS/hojamenu.css">
</head>

<body>
    <!--//@ Barra de menu que muestra determinados elementos si tienes rol de administrador-->

    <div class="topnav">
        <a href="logoff.php">Salir</a>
        <a href="configurar.php" <?php
                                    if (isset($_SESSION['usuario'])) {
                                        $a = unserialize($_SESSION['usuario']);
                                        if (!$a->Admin()) {
                                            echo "style ='display:none;'";
                                        }
                                    } else {
                                        echo "style ='display:none;'";
                                    }
                                    ?>>Configuracion</a>
        <a href="usuarios.php" <?php
                                if (isset($_SESSION['usuario'])) {
                                    $a = unserialize($_SESSION['usuario']);
                                    if (!$a->Admin()) {
                                        echo "style ='display:none;'";
                                    }
                                } else {
                                    echo "style ='display:none;'";
                                }
                                ?>>Usuarios</a>
        <a href="publicaciones.php" <?php
                                    if (isset($_SESSION['usuario'])) {
                                        $a = unserialize($_SESSION['usuario']);
                                        if (!$a->Admin()) {
                                            echo "style ='display:none;'";
                                        }
                                    } else {
                                        echo "style ='display:none;'";
                                    }
                                    ?>>Publicaciones</a>

        <a href="perfil.php">Perfil</a>
        <a href="index.php">Pagina Principal</a>
        <a href="publicar.php">Publicar</a>
        <img src="<?php

                    if (isset($_SESSION['usuario'])) {
                        $a = unserialize($_SESSION['usuario']);

                        $nombrefoto = "fotos/foto_" . $a->getuserName() . ".jpg";
                        if (file_exists($nombrefoto)) {

                            echo $nombrefoto;
                        }
                    } else {
                        echo "fotos/default.png";
                    }
                    ?>" />
        <p><?php
            if (isset($_SESSION['usuario'])) {
                $a = unserialize($_SESSION['usuario']);
                echo $a->getuserName();
            } else {
                echo "Usuario no registrado";
            }

            ?></p>

    </div>
</body>

</html>