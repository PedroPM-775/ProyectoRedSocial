<?php
/*

    Título: Tarefa 3 - 8

    Autor:Pedro Pina Menéndez

    Data modificación: 13/10/2022
    Versión 1.0

*/
?>


<html>

<head>
  <title>Formulario</title>
</head>

<body>

  <?php

  function calcularValor()
  {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $valor = '';
    for ($i = 0; $i < 64; $i++) {
      $valor .= $characters[rand(0, $charactersLength - 1)];
    }
    return $valor;
  }

  $valor = calcularvalor();
  $errores = [];


  if (isset($_POST['enviar'])) {

    if (!isset($_POST['nome'])) {
      array_push($errores, "nome");
    }
    if (!isset($_POST['contrasinal'])) {
      array_push($errores, "contrasinal");
    }
    if (!isset($_POST['contrasinalrep'])) {
      array_push($errores, "contrasinalrep");
    }
    if (!isset($_POST['email'])) {
      array_push($errores, "email");
    }
    if (!isset($_POST['telefono'])) {
      array_push($errores, "telefono");
    }
    if (!isset($_POST['valores'])) {
      array_push($errores, "valores");
    }
    if (!isset($_POST['cajas'])) {
      array_push($errores, "cajas");
    }
    if (!isset($_POST['nacimiento'])) {
      array_push($errores, "nacimiento");
    }
    if (!isset($_POST['textarea'])) {
      array_push($errores, "textarea");
    }
    if (!isset($_POST['username'])) {
      array_push($errores, "username");
    }
    if (!isset($_POST['token-csrf'])) {
      array_push($errores, "token-csrf");
    }
    if (!isset($_POST['marcas'])) {
      array_push($errores, "marcas");
    }
    if (!isset($_POST['ciudades'])) {
      array_push($errores, "ciudades");
    }
  }

  if (isset($_POST['enviar']) && count($errores) == 0) {
    echo "<h1>Todos los datos son correctos.</h1>";
    echo "<br>";
  } else {
    if (count($errores) != 0) {
      echo "<h1>Faltan los siguientes datos.</h1>";
      for ($i = 0; $i < count($errores); $i++) {
        echo $errores[$i];
        echo "</br>";
      }
    }
  ?>

    <form name="formulario" action='rexistro.php' method="post">
      <label> Nombre de Usuario </label> <input type="text" name="nome" value="<?php if (isset($_POST['nome'])) echo $_POST['nome'] ?>" required /> </br></br>


      <label> Contraseña </label> <input type="password" name="contrasinal" value="<?php if (isset($_POST['contrasinal'])) echo $_POST['contrasinal'] ?>" required /></br></br>



      <label> Confirme la Contraseña </label> <input type="password" name="contrasinalrep" value="<?php if (isset($_POST['contrasinalrep'])) echo $_POST['contrasinalrep'] ?>" required /></br></br>


      <input type="hidden" name="token-csrf" value="<?php echo $valor ?>" /></br></br>


      <label> Correo Electronico </label> <input type="email" name="email" value="<?php if (isset($_POST['email'])) echo $_POST['email'] ?>" required /></br></br>



      <label> Telefono </label> <input type="tel" name="telefono" value="<?php if (isset($_POST['telefono'])) echo $_POST['telefono'] ?>" required /></br></br>



      <fieldset>
        <legend> radioButtons </legend>
        <input type="radio" id="valor1" name="valores[]" value="valor1" <?php if (isset($_POST['valores']) && in_array("valor1", $_POST['valores'])) echo "checked"; ?>>
        <label for="valor1">Opcion 1</label><br>


        <input type="radio" id="valor2" name="valores[]" value="valor2" <?php if (isset($_POST['valores']) && in_array("valor2", $_POST['valores'])) echo "checked"; ?>>
        <label for="valor2">Opcion 2</label><br>
        <input type="radio" id="valor3" name="valores[]" value="valor3" <?php if (isset($_POST['valores']) && in_array("valor3", $_POST['valores'])) echo "checked"; ?>>
        <label for="valor3">Opcion 3</label></br></br>
      </fieldset>


      <fieldset>
        <legend> CheckBoxes </legend>
        <input type="checkbox" id="checkbox1" name="cajas[]" value="cajas1" <?php if (
                                                                              isset($_POST['cajas'])
                                                                              && in_array("cajas1", $_POST['cajas'])
                                                                            ) echo "checked";

                                                                            ?>>


        <label for="checkbox1"> Checkbox 1</label><br>
        <input type="checkbox" id="checkbox2" name="cajas[]" value="cajas2" <?php if (
                                                                              isset($_POST['cajas'])
                                                                              && in_array("cajas2", $_POST['cajas'])
                                                                            ) echo "checked";

                                                                            ?>>
        <label for="checkbox2"> Checkbox 2</label><br>
        <input type="checkbox" id="checkbox3" name="cajas[]" value="cajas3" <?php if (
                                                                              isset($_POST['cajas'])
                                                                              && in_array("cajas3", $_POST['cajas'])
                                                                            ) echo "checked";

                                                                            ?>>
        <label for="checkbox3"> checkbox 3</label></br></br>
      </fieldset>



      <label> Fecha de Nacimiento </label> <input type="date" name="nacimiento" value="<?php if (isset($_POST['nacimiento'])) echo $_POST['nacimiento'] ?>" required /></br></br>



      <label> TextArea </label> <textarea name="textarea" required> <?php if (isset($_POST['textarea'])) echo $_POST['textarea'] ?></textarea></br></br>



      <label> Nombre de Usuario </label> <input type="text" name="username" value="<?php if (isset($_POST['username'])) echo $_POST['username'] ?>" required /></br></br>



      <label for="lang">Desplegable</label>
      <select name="marcas" id="lang">
        <option value="opel" <?php if (isset($_POST['marcas']) && in_array("opel", $_POST['marcas'])) echo "selected"; ?>>opel</option>
        <option value="ferrari" <?php if (isset($_POST['marcas']) && in_array("ferrari", $_POST['marcas'])) echo "selected"; ?>>ferrari</option>
        <option value="ford" <?php if (isset($_POST['marcas']) && in_array("ford", $_POST['marcas'])) echo "selected"; ?>>ford</option>
        <option value="audi" <?php if (isset($_POST['marcas']) && in_array("audi", $_POST['marcas'])) echo "selected"; ?>>audi</option>
      </select> </br></br>

      <label for="lang">No Desplegable</label>
      <select name="ciudades[]" multiple="yes" size="3">

        <option value="newyork" <?php if (isset($_POST['ciudades']) && in_array("newyork", $_POST['ciudades'])) echo "selected"; ?>>New York </option>
        <option value="bucharest" <?php if (isset($_POST['ciudades']) && in_array("bucharest", $_POST['ciudades'])) echo "selected"; ?>>Bucharest</option>
        <option value="madrid" <?php if (isset($_POST['ciudades']) && in_array("madrid", $_POST['ciudades'])) echo "selected"; ?>>Madrid</option>

      </select> <br />


      <input type="submit" name='enviar' value="enviar" /></br></br>

      <input type="reset" name='reset' value="resetear" /></br></br>




    </form>

  <?php
  }

  ?>


</body>

</html>