<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="hojamenu.css">
</head>

<body>
    <div class="topnav">
        <a href="logoff.php">Salir</a>
        <a href="usuarios.php">Usuarios</a>
        <a href="perfil.php">Perfil</a>
        <a href="index.php">Pagina Principal</a>
        <img src="<?php
                    $nombrefoto = "fotos/foto_" . $_SESSION['usuario'] . ".jpg";
                    if (file_exists($nombrefoto)) {
                        echo $nombrefoto;
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