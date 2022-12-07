<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/hojaOscura.css">
    <title>Crear publicacion</title>
</head>

<body>
    <?php
    include "menu.php";
    include "DAO.php";
    include "Publicacion.class.php";
    if (!isset($_SESSION['usuario'])) {
        header("Location: login.php");
    }
    $archivo = "./CSV/publicaciones.csv";
    $datos = array();
    $datos = leerCSV($archivo);
    $cabecera = $datos[0];
    $errores = array();
    $programar = false;
    if (isset($_POST['enviar'])) {

        if (!isset($_POST['titulo'])) {
            array_push($errores, "titulo");
        }
        if (isset($_POST['titulo'])) {
            $titulo = $_POST['titulo'];
            $titulotrim = ltrim($titulo);
            if (!preg_match("/^[a-zA-Z]+$/", $titulotrim)) {
                array_push($errores, "El titulo contiene caracteres no permitidos");
            }
        }

        if (!isset($_POST['descripcion'])) {
            array_push($errores, "descripcion");
        }

        if (isset($_POST['descripcion'])) {
            $descripcion = $_POST['descripcion'];

            if (!preg_match('/[a-zA-Z0-9]+$/', $descripcion)) {
                array_push($errores, "El formato de la descripcion del contenido no es correcto, no debe contener simbolos extraños");
            }
        }

        if (isset($_POST['fecha'])) {

            if (!empty($_POST['fecha'])) {
                $programar = true;
            }
        }
    }
    //@ Si no hay errores y se ha enviado, imprime por pantalla un mensaje de todo correcto
    if (isset($_POST['enviar']) && count($errores) == 0) {

        $introducir = array();
        //@ Cuento el numero de datos que hay en la base y lo utilizo para el codigo de la publicacion
        $string = count($datos);
        array_push($introducir, $string);

        $string = $_POST['titulo'];
        $stringtrim = trim($string);
        array_push($introducir, $stringtrim);

        $string = $_POST['descripcion'];
        $stringtrim = trim($string);
        array_push($introducir, $stringtrim);
        array_push($introducir, "multimedia");
        if ($programar == true) {
            $string = $_POST['fecha'];
            $stringtrim = trim($string);
            array_push($introducir, $stringtrim);
        }
        if ($programar == false) {
            $fecha = date('d-m-y h:i:s');

            array_push($introducir, $fecha);
        }
        $string = $_SESSION['usuario'];
        $stringtrim = trim($string);
        array_push($introducir, $stringtrim);
        array_push($datos, $introducir);
        $publicacion = new Publicacion($introducir[0], $introducir[1], $introducir[2], $introducir[3], $introducir[4], $introducir[5]);

        $publicacion->moderar();
        $publicacion->almacenarPublicacion();
        var_dump($_FILES['foto']);
        if (!empty($_FILES['foto']['name'])) {
            $directorioSubida = "multimediaPublicaciones/";
            $extensionsValidas = array("jpg", "png");
            $nomeFoto = $_FILES['foto']['name'];
            $tamanoFoto = $_FILES['foto']['size'];
            $directoriotemp = $_FILES['foto']['tmp_name'];
            $tipoFoto = $_FILES['foto']['type'];
            $arrayArquivo = pathinfo($nomeFoto);
            $extension = $arrayArquivo['extension'];

            if (!in_array($extension, $extensionsValidas)) {
                array_push($errores, "la extension no sirve");
            }
            $nomeFoto = "foto_" . $titulo . "_" . $fecha;
            if (count($errores) == 0) {
                $nomeCompleto = $directorioSubida . $nomeFoto . ".jpg";
                move_uploaded_file($directoriotemp, $nomeCompleto);
            } else {
                echo "error creando la foto";
            }
        }

        //   header("Location: index.php");
    } else {

        //@ Formulario para la creacion de publicaciones.
    ?>
        <div id="contenedorform">
            <form name="publicar" action='publicar.php' method="post">
                <label>Titulo</label> <input type="text" name="titulo" value="<?php if (
                                                                                    isset($_POST['titulo'])
                                                                                ) echo $_POST['titulo'] ?>" required /> </br></br>

                <label>Texto de la Publicación</label><textarea name="descripcion" required><?php if (
                                                                                                isset($_POST['descripcion'])
                                                                                            ) echo $_POST['descripcion'] ?></textarea></br></br>

                <label>Fecha de Publicacion(opcional)</label> <input type="datetime-local" name="fecha" value="<?php if (
                                                                                                                    isset($_POST['fecha'])
                                                                                                                ) echo $_POST['fecha'] ?>" /></br></br>

                <legend>¿Quieres añadir una imagen a la publicacion?(opcional)</legend>
                <input type="file" name="foto" accept="image/png, image/jpeg" id="foto">
                <br>

                <input type="submit" name='enviar' value="enviar" /></br></br>
            </form>

        <?php
    }
        ?>
</body>

</html>