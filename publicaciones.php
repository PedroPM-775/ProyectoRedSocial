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
    include "menu.php";
    $archivo = "./CSV/publicaciones.csv";
    $datos = array();
    $datos = leerCSV($archivo);
    $cabecera = $datos[0];

    //@ Codigo para comprobar si el formulario tiene errores y si ha sido enviado o si se ha accedido a la pagina
    ?>
    <table aria-describedby="Tabla rellena con datos de publicaciones.csv">
        <caption>Publicaciones en la base</caption>
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
    <a href="index.php"> Volver al formulario de registro</a>

</body>

</html>