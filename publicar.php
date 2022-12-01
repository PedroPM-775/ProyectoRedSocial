<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear publicacion</title>
</head>

<body>
    <?php
    include "DAO.php";
    include "menu.php";
    ?>

    <div id="contenedorform">
        <form name="usuarios" action='usuarios.php' method="post">
            <label>Titulo</label> <input type="text" name="titulo" value="<?php if (
                                                                                isset($_POST['titulo'])
                                                                            ) echo $_POST['titulo'] ?>" required /> </br></br>

            <label>Texto de la Publicación</label> <textarea name="descripcion" required><?php if (
                                                                                                isset($_POST['descripcion'])
                                                                                            ) echo $_POST['descripcion'] ?></textarea></br></br>

            <label>Fecha de Publicacion(opcional)</label> <input type="datetime-local" name="fecha" value="<?php if (
                                                                                                                isset($_POST['fecha'])
                                                                                                            ) echo $_POST['fecha'] ?>" required /></br></br>

            <legend>¿Quieres añadir una imagen a la publicacion?</legend>
            <input type="file" name="foto" id="foto">
            <br>




</body>

</html>