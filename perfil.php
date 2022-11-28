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
    <div id="contenedorform">
        <form action="" method="post">

            <legend> ¿Que buscas en Uchagram? </legend>
            <input type="radio" id="valor1" name="valores[]" value="valor1" <?php if (
                                                                                isset($_POST['valores']) && in_array("valor1", $_POST['valores'])
                                                                            ) echo "checked"; ?>>
            <label for="valor1">Pasarmelo Bien</label><br>
            <input type="radio" id="valor2" name="valores[]" value="valor2" <?php if (
                                                                                isset($_POST['valores']) && in_array("valor2", $_POST['valores'])
                                                                            ) echo "checked"; ?>>
            <label for="valor2">Hacer amigos</label><br>
            <input type="radio" id="valor3" name="valores[]" value="valor3" <?php if (
                                                                                isset($_POST['valores']) && in_array("valor3", $_POST['valores'])
                                                                            ) echo "checked"; ?>>
            <label for="valor3">Jugar a los juegos de la pagina</label></br></br>

            <legend> Elige tus opciones de visualizacion: </legend>
            <label for="lang">Tema</label>
            <select name="tema" id="lang">
                <option value="claro" <?php if (isset($_POST['tema']) && strcasecmp("claro", $_POST['tema'])) echo "selected"; ?>>Claro</option>
                <option value="oscuro" <?php if (isset($_POST['tema']) && strcasecmp("oscuro", $_POST['tema'])) echo "selected"; ?>>Oscuro</option>
                <option value="accesible" <?php if (isset($_POST['tema']) && strcasecmp("accesible", $_POST['tema'])) echo "selected"; ?>>Accesible</option>

            </select> </br></br>
            <label for="tamano">Tamaño de letra</label>
            <input type="number" id="tamano" name="tamano" value="tamaño por defecto" /><br> <br>
            <label for="lang">Fuente</label>
            <select name="fuente" id="lang">
                <option value="calibri" <?php if (isset($_POST['fuente']) && strcasecmp("calibri", $_POST['fuente'])) echo "selected"; ?>>Calibri</option>
                <option value="arial" <?php if (isset($_POST['fuente']) && strcasecmp("arial", $_POST['fuente'])) echo "selected"; ?>>Arial</option>
            </select>


            <legend>Elige tu foto de perfil </legend>
            <input type="file" name="foto" id="foto">
            <img id="fotoperfil" src="<?php
                                        if (file_exists($foto)) {
                                            echo $foto;
                                        } else {
                                            echo "fotos/default.png";
                                        }


                                        ?>">
        </form>
    </div>
</body>

</html>