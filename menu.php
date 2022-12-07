<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="./CSS/hojamenu.css">
</head>

<body>
    <!--//@ Barra de menu que muestra determinados elementos si tienes rol de administrador-->

    <div class="topnav">
        <a href="logoff.php">Salir</a>
        <a href="usuarios.php" <?php
                                if (isset($_SESSION['usuario'])) {
                                    if ($_SESSION['rol'] != 'Administrador') {
                                        echo "style ='display:none;'";
                                    }
                                } else {
                                    echo "style ='display:none;'";
                                }
                                ?>>Usuarios</a>
        <a href="publicaciones.php" <?php
                                    if (isset($_SESSION['usuario'])) {
                                        if ($_SESSION['rol'] != 'Administrador') {
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

                        $nombrefoto = "fotos/foto_" . $_SESSION['usuario'] . ".jpg";
                        if (file_exists($nombrefoto)) {

                            echo $nombrefoto;
                        }
                    } else {
                        echo "fotos/default.png";
                    }
                    ?>" />
        <p><?php
            if (isset($_SESSION['usuario'])) {
                echo $_SESSION['usuario'];
            } else {
                echo "Usuario no registrado";
            }

            ?></p>

    </div>
</body>

</html>