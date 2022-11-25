<?php
/*

        Título: Tarefa 4 - 1

        Autor:Pedro Pina Menéndez

        Data modificación: 17/11/2022
        Versión 1.0

    */
include "DAO.php";

// Recupérase a información da sesión
session_start();
// Comprobase que o usuario se autenticou
if (!isset($_SESSION['usuario'])) {
    die("Error, inicie sesion <a href='login.php'>aqui</a>.<br />");
}
if ($_SESSION['rol'] != 'Administrador') {
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
    <link rel="stylesheet" href="hojaform.css">
</head>

<body>
    <?php

    $archivo = "usuarios.csv";
    $datos = array();
    $datos = leerCSV($archivo);
    $cabecera = $datos[0];
    $errores = array();
    $listanombres = array();
    for ($i = 1; $i < count($datos); $i++) {
        $filanombres = $datos[$i];
        array_push($listanombres, $filanombres[8]);
    }
    //! Funcion para validar el formulario

    //@ Codigo para comprobar si el formulario tiene errores y si ha sido enviado o si se ha accedido a la pagina
    if (isset($_POST['enviar'])) {

        if (!isset($_POST['nome'])) {
            array_push($errores, "nome");
        }
        if (isset($_POST['nome'])) {
            $nombre = $_POST['nome'];
            $nombretrim = ltrim($nombre);
            if (!preg_match("/^[a-zA-Z]+$/", $nombretrim)) {
                array_push($errores, "El nombre contiene caracteres no permitidos");
            }
        }

        //@ Valores validos para nombre: Pedro, Jose
        //@ Valores no validos para nombre: adsf41234, "X Æ A-12", @#~adefesio, 8754apepe, o83hara
        if (!isset($_POST['contrasinal'])) {
            array_push($errores, "contrasinal");
        }
        if (isset($_POST['contrasinal'])) {
            $contrasena = $_POST['contrasinal'];
            if (strlen($contrasena) > 8) {
                if (!preg_match('/[a-zA-Z0-9]+$/', $contrasena)) {
                    array_push($errores, "El formato de la contraseña no es correcto, no debe contener simbolos extraños");
                }
            } else {
                array_push($errores, "La contraseña es del tamaño incorrecto, debe de ser de al menos 8 cifras");
            }
        }
        //@ Cualquier valor es valido como contraseña
        if (!isset($_POST['contrasinalrep'])) {
            array_push($errores, "contrasinalrep");
        }
        if (isset($_POST['contrasinalrep'])) {
            $contra1 = $_POST['contrasinal'];
            $contra2 = $_POST['contrasinalrep'];
            if ($contra1 != $contra2) {
                array_push($errores, "Las contraseñas no coinciden");
            }
        }
        if (!isset($_POST['email'])) {
            array_push($errores, "email");
        }

        if (isset($_POST['email'])) {
            $email = $_POST['email'];
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                array_push($errores, "El formato de email no es correcto");
            }
        }
        //@ Valores validos para email: PEPITO@gmail.com, josefina@yahoo.com
        //@ Valores no validos para email(separados por comas): @jose@josefagmail@.com, 1234@1234987.com.@gmail,
        //@ Agargfunkel@yahoo@extremecom

        if (!isset($_POST['telefono'])) {
            array_push($errores, "telefono");
        }

        if (isset($_POST['telefono'])) {
            $numero = $_POST['telefono'];
            if (strlen($numero) === 9) {
                if (!preg_match('/^[0-9]+$/', $numero)) {
                    array_push($errores, "El formato del telefono no es correcto, solo debe tener numeros");
                }
            } else {
                array_push($errores, "El telefono es del tamaño incorrecto, debe de ser de 9 cifras");
            }
        }
        //@ Valores validos para telefono: 987654321, 654987321
        //@Valores no validos para telefono: lkandf2ql3jawidf, 89756321868975, gma21i4321qs
        if (!isset($_POST['valores'])) {
            array_push($errores, "valores");
        }

        if (!isset($_POST['cajas'])) {
            array_push($errores, "cajas");
        }
        if (!isset($_POST['nacimiento'])) {
            array_push($errores, "nacimiento");
        }
        if (!isset($_POST['descripcion'])) {
            array_push($errores, "descripcion");
        }

        if (isset($_POST['descripcion'])) {
            $area = $_POST['descripcion'];
            $areatrim = ltrim($area);
            if (!preg_match("/^[a-zA-Z]+$/", $areatrim)) {
                array_push($errores, "La descripcion contiene caracteres no permitidos");
            }
        }
        //@ Valores validos para el textarea: jkhwsidfunajekwnalsjkdflkjadfs, hola buenos dias mi nombre es pedro
        //@ Valores no validos para el textarea: lasfljkqwuoiasjlkfwqoiuzkjlcnvpuian098172349867wd, lansflkjn3987478w, h0la mi nombr3 es p3dr0

        if (!isset($_POST['username'])) {
            array_push($errores, "username");
        }
        if (isset($_POST['username'])) {
            $username = $_POST['username'];
            $nombretrim = ltrim($username);
            if (!preg_match("/^[a-zA-Z]+$/", $nombretrim)) {
                array_push($errores, "El nombre de usuario contiene caracteres no permitidos");
            }
        }
        for ($i = 0; $i < count($listanombres); $i++) {
            if ($_POST['username'] == $listanombres[$i]) {
                array_push($errores, "El nombre de usuario ya existe, elija otro");
            }
        }

        //@ Valores validos para nombre: Pedro, ImVorte
        //@ Valores no validos para nombre: adsf41234, "X Æ A-12", @#~adefesio, 8754apepe, o83hara

        if (!isset($_POST['genero'])) {
            array_push($errores, "genero");
        }
        if (!isset($_POST['servidor'])) {
            array_push($errores, "servidor");
        }
        if (!isset($_POST['rol'])) {
            array_push($errores, "rol");
        }
    }
    //@ Si no hay errores y se ha enviado, imprime por pantalla un mensaje de todo correcto
    if (isset($_POST['enviar']) && count($errores) == 0) {

        $introducir = [];
        $string = $_POST['nome'];
        $stringtrim = ltrim($string);
        array_push($introducir, $stringtrim);
        $string = $_POST['contrasinal'];
        $stringtrim = ltrim($string);

        $ps = crypt($stringtrim, "DmGx5dZx");

        array_push($introducir, $ps);
        $string = $_POST['email'];
        $stringtrim = ltrim($string);
        array_push($introducir, $stringtrim);
        $string = $_POST['telefono'];
        $stringtrim = ltrim($string);
        array_push($introducir, $stringtrim);
        $valoresaa = implode('-', $_POST['valores']);
        array_push($introducir, $valoresaa);
        $valoresaa = implode('-', $_POST['cajas']);
        array_push($introducir, $valoresaa);
        $string = $_POST['nacimiento'];
        $stringtrim = ltrim($string);
        array_push($introducir, $stringtrim);
        $area = $_POST['descripcion'];
        $areabuena = str_replace('"', "", $area);
        $areabuenatrim = ltrim($areabuena);

        array_push($introducir, $areabuenatrim);
        $string = $_POST['username'];
        $stringtrim = ltrim($string);
        array_push($introducir, $stringtrim);
        array_push($introducir, $_POST['genero']);
        $valoresaa = implode('-', $_POST['servidor']);
        array_push($introducir, $valoresaa);
        array_push($introducir, $_POST['rol']);

        array_push($datos, $introducir);
        escribirCSV($archivo, $datos);


    ?>
        <table aria-describedby="Tabla rellena con datos de tablas.csv">
            <caption>Tabla de datos</caption>
            <?php
            echo "<tr>";
            //@Imprimo la primera fila en la cabecera de la tabla
            for ($i = 0; $i < count($cabecera); $i++) {
                $variable = $cabecera[$i];
                echo "<th>$variable</th>";
            }
            echo "</tr>";
            //@ Usando un bucle for dentro de otro, imprimo todos los elementos del archivo en distintas filas de la tabla
            for ($i = 1; $i < count($datos); $i++) {
                $fila = $datos[$i];
                echo "<tr>";
                for ($j = 0; $j < count($fila); $j++) {
                    $variable = $fila[$j];
                    echo "<td>$variable</td>";
                }
                echo "</tr>";
            }
            ?>
        </table>
        </br>
        <a href="usuarios.php"> Volver al formulario de registro</a>
    <?php


    }
    //@ Si hay errores o no se ha enviado, se imprime una lista de errores y el formulario

    else {

    ?>
        <div id="contenedortabla">
            <table aria-describedby="Tabla rellena con datos de tablas.csv">
                <caption>Tabla de datos</caption>
                <?php
                echo "<tr>";
                //@Imprimo la primera fila en la cabecera de la tabla
                for ($i = 0; $i < count($cabecera); $i++) {
                    $variable = $cabecera[$i];
                    echo "<th>$variable</th>";
                }
                echo "</tr>";
                //@ Usando un bucle for dentro de otro, imprimo todos los elementos del archivo en distintas filas de la tabla
                for ($i = 1; $i < count($datos); $i++) {
                    $fila = $datos[$i];
                    echo "<tr>";
                    for ($j = 0; $j < count($fila); $j++) {
                        $variable = $fila[$j];
                        echo "<td>$variable</td>";
                    }
                    echo "<td> <a href = 'borrar.php?fila=$i'>Eliminar</a> </td>";
                    echo "</tr>";
                }

                ?>

            </table>
        </div>
        <br>


        <?php
        if (count($errores) != 0) {
            echo "<div id='caja'>";
            echo "<h1>Faltan los siguientes datos.</h1>";
            for ($i = 0; $i < count($errores); $i++) {
                echo $errores[$i];
                echo "</br>";
            }
            echo "</div>";
        }
        ?>

        <br> <br>
        <div id="contenedorform">
            <form name="usuarios" action='usuarios.php' method="post">
                <label> Nombre de Usuario </label> <input type="text" name="nome" value="<?php if (
                                                                                                isset($_POST['nome'])
                                                                                            ) echo $_POST['nome'] ?>" required /> </br></br>

                <label> Contraseña </label> <input type="password" name="contrasinal" value="<?php if (
                                                                                                    isset($_POST['contrasinal'])
                                                                                                ) echo $_POST['contrasinal'] ?>" required /></br></br>

                <label> Confirme la Contraseña </label> <input type="password" name="contrasinalrep" value="<?php if (
                                                                                                                isset($_POST['contrasinalrep'])
                                                                                                            ) echo $_POST['contrasinalrep'] ?>" required /></br></br>

                <label> Correo Electronico </label> <input type="email" name="email" value="<?php if (
                                                                                                isset($_POST['email'])
                                                                                            ) echo $_POST['email'] ?>" required /></br></br>

                <label> Telefono </label> <input type="tel" name="telefono" value="<?php if (
                                                                                        isset($_POST['telefono'])
                                                                                    ) echo $_POST['telefono'] ?>" required /></br></br>


                <fieldset>
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
                </fieldset>

                <fieldset>
                    <legend> ¿Que musica te gusta? </legend>
                    <input type="checkbox" id="checkbox1" name="cajas[]" value="cajas1" <?php if (
                                                                                            isset($_POST['cajas'])
                                                                                            && in_array("cajas1", $_POST['cajas'])
                                                                                        ) echo "checked"; ?>>

                    <label for="checkbox1"> Rock</label><br>

                    <input type="checkbox" id="checkbox2" name="cajas[]" value="cajas2" <?php if (
                                                                                            isset($_POST['cajas'])
                                                                                            && in_array("cajas2", $_POST['cajas'])
                                                                                        ) echo "checked"; ?>>
                    <label for="checkbox2"> Pop</label><br>
                    <input type="checkbox" id="checkbox3" name="cajas[]" value="cajas3" <?php if (
                                                                                            isset($_POST['cajas'])
                                                                                            && in_array("cajas3", $_POST['cajas'])
                                                                                        ) echo "checked"; ?>>
                    <label for="checkbox3"> Flamenco</label></br></br>
                </fieldset>

                <br>
                <label> Fecha de Nacimiento </label> <input type="date" name="nacimiento" value="<?php if (
                                                                                                        isset($_POST['nacimiento'])
                                                                                                    ) echo $_POST['nacimiento'] ?>" required /></br></br>

                <label> Descripcion sobre ti </label> <textarea name="descripcion" required><?php if (
                                                                                                isset($_POST['descripcion'])
                                                                                            ) echo $_POST['descripcion'] ?></textarea></br></br>

                <label> Nombre de Usuario </label> <input type="text" name="username" value="<?php if (
                                                                                                    isset($_POST['username'])
                                                                                                ) echo $_POST['username'] ?>" required /></br></br>

                <label for="lang">Genero</label>
                <select name="genero" id="lang">
                    <option value="hombre" <?php if (isset($_POST['genero']) && strcasecmp("hombre", $_POST['genero'])) echo "selected"; ?>>Hombre</option>
                    <option value="mujer" <?php if (isset($_POST['genero']) && strcasecmp("mujer", $_POST['genero'])) echo "selected"; ?>>Mujer</option>
                    <option value="otro" <?php if (isset($_POST['genero']) && strcasecmp("otro", $_POST['genero'])) echo "selected"; ?>>Otro</option>
                </select> </br></br>

                <label for="lang">Servidor</label>
                <select name="servidor[]" multiple="yes" size="3">
                    <option value="europa" <?php if (isset($_POST['servidor']) && in_array("europa", $_POST['servidor'])) echo "selected"; ?>>Europa</option>
                    <option value="america" <?php if (isset($_POST['servidor']) && in_array("america", $_POST['servidor'])) echo "selected"; ?>>America</option>
                    <option value="asia" <?php if (isset($_POST['servidor']) && in_array("asia", $_POST['servidor'])) echo "selected"; ?>>Asia</option>
                </select> <br />
                <br />

                <label for="lang">Rol</label>
                <select name="rol" id="lang">
                    <option value="Usuario" <?php if (isset($_POST['rol']) && strcasecmp("Usuario", $_POST['rol'])) echo "selected"; ?>>Usuario</option>
                    <option value="Administrador" <?php if (isset($_POST['rol']) && strcasecmp("Administrador", $_POST['rol'])) echo "selected"; ?>>Administrador</option>
                </select> </br></br>

                <input type="submit" name='enviar' value="enviar" /></br></br>
                <input type="reset" name='reset' value="resetear" /></br></br>
            </form>
        </div>
        <a href="logoff.php">Cerrar Sesion</a>
    <?php
    }
    ?>
</body>

</html>