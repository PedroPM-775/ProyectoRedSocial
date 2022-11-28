<?php
include "DAO.php";
include "menu.php";

session_start();
//@ Comprobase que o usuario se autenticou
if (!isset($_SESSION['usuario'])) {
    die("Error, inicie sesion <a href='login.php'>aqui</a>.<br />");
}
$usuario = $_SESSION['usuario'];
$foto = "fotos/foto_" . $usuario . ".jpg";
$errores = array();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="hojaform.css">
    <title>Perfil</title>
</head>

<body>
    <?php
    if (isset($_POST['modificar'])) {

        if (isset($_POST['foto'])) {
        }

        //@ Codigo para hacer si la pagina viene del metodo modificar, compruebo si los datos sonc correctos
        if (!isset($_POST['tamano'])) {
            //$ $tamano = tamaño por defecto
        }

        if (isset($_POST['tamano'])) {
            $numero = $_POST['tamano'];
            if (!preg_match('/^[0-9]+$/', $numero)) {
                array_push($errores, "El formato del tamaño de fuente no es correcto, solo debe tener numeros");
            }
        }
        if (!isset($_POST['tema'])) {
            array_push($errores, "Falta el tema");
        }
        if (!isset($_POST['fuente'])) {
            array_push($errores, "Falta la fuente");
        }
        //@ Escribo los datos en la cookie si no hay errores
        if (count($errores) == 0) {
            unset($_COOKIE['preferencias']);
            $contenidocookie = $_SESSION['usuario'] . "/" . $_POST['tamano'] . "/" . $_POST['tema'] . "/" . $_POST['fuente'];
            echo $contenidocookie;
            setCookie("preferencias", $contenidocookie);
            header("Location: ejercicio1.php");
        }
    } else if (isset($_POST['defecto'])) {
        unset($_COOKIE['preferencias']);
        $contenidocookie = $_SESSION['usuario'] . "/" . "14" . "/" . "claro" . "/" . "calibri";
        echo $contenidocookie;
        setCookie("preferencias", $contenidocookie);
        header("Location: ejercicio1.php");
    } else {
        if (isset($_COOKIE['preferencias'])) {
            echo $_COOKIE['preferencias'];
        }
    ?>
        <div id="contenedorform">
            <form action="perfil.php" method="post">


                <legend>Elige tu foto de perfil </legend>
                <input type="file" name="foto" id="foto">
                <br>
                <img id="fotoperfil" src="<?php
                                            if (file_exists($foto)) {
                                                echo $foto;
                                            } else {
                                                echo "fotos/default.png";
                                            }


                                            ?>">
                <br>

                <legend> Elige tus opciones de personalización: </legend>
                <label for="lang">Tema</label>
                <select name="tema" id="lang">
                    <option value="claro" <?php if (
                                                isset($_POST['tema']) && strcasecmp("claro", $_POST['tema'])
                                            ) echo "selected"; ?>>Claro</option>
                    <option value="oscuro" <?php if (
                                                isset($_POST['tema']) && strcasecmp("oscuro", $_POST['tema'])
                                            ) echo "selected"; ?>>Oscuro</option>
                    <option value="accesible" <?php if (
                                                    isset($_POST['tema']) && strcasecmp("accesible", $_POST['tema'])
                                                ) echo "selected"; ?>>Accesible</option>

                </select> </br></br>
                <label for="tamano">Tamaño de letra</label>
                <input type="number" id="tamano" name="tamano" /><br> <br>
                <label for="lang">Fuente</label>
                <select name="fuente" id="lang">
                    <option value="calibri" <?php if (
                                                isset($_POST['fuente']) && strcasecmp("calibri", $_POST['fuente'])
                                            ) echo "selected"; ?>>Calibri</option>
                    <option value="arial" <?php if (
                                                isset($_POST['fuente']) && strcasecmp("arial", $_POST['fuente'])
                                            ) echo "selected"; ?>>Arial</option>
                </select>
                <input type="submit" name="modificar" value="modificar">
                <input type="submit" name="defecto" value="defecto">
                <br><br>

            </form>
        </div>
    <?php } ?>
</body>

</html>