    <?php
    /*

        Título: Tarefa 3 - 11

        Autor:Pedro Pina Menéndez

        Data modificación: 17/11/2022
        Versión 1.0

    */
    ?>
    <html>
    <head>
        <title>Formulario</title>
        <link rel="stylesheet" href="hojaform.css">
        
    </head>
    <body>

        <?php

        $archivo = "tablas.csv";
        $datos = array();

        //! Funcion para leer el archivo CSV
        function leerCSV($archivo){
            $arrayDatos = array();
            if ($fp = fopen($archivo, "r")) {
            while($filaDatos = fgetcsv($fp, 0, ",")){
                $arrayDatos[] = $filaDatos;
            }
            }
            else
            {
                echo "Error, no se puede acceder al archivo ".$archivo."<br>";
                return false;
            }
            fclose($fp);
            return $arrayDatos;
        }
        //! Funcion para escribir en el CSV
        function escribirCSV($archivo, $arrayEscribir){
            if($fp = fopen($archivo, "w")){
                foreach ($arrayEscribir as $filaDatos) {
                    fputcsv($fp, $filaDatos);
                }
            }
            else
            {
                echo "Error, no se pudo abrir el archivo";
                return false;
            }
            fclose($fp);
            return true;

        }

        $datos = leerCSV($archivo);
        $cabecera = $datos[0];
        $errores = array();
        //! Funcion para validar el formulario
        
        //@ Codigo para comprobar si el formulario tiene errores y si ha sido enviado o si se ha accedido a la pagina
        if(isset($_POST['enviar'])){
            
            if(!isset($_POST['nome'])){
            array_push($errores, "nome");
            
            }
            if(isset($_POST['nome'])){
                $nombre = $_POST['nome'];
                $nombretrim = ltrim($nombre);
                if (!preg_match("/^[a-zA-Z]+$/", $nombretrim)){
                array_push($errores,"El nombre contiene caracteres no permitidos");
                }
             }
             //@ Valores validos para nombre: Pedro, Jose
             //@ Valores no validos para nombre: adsf41234, "X Æ A-12", @#~adefesio, 8754apepe, o83hara

            if(!isset($_POST['contrasinal'])){
            array_push($errores, "contrasinal");
            
            }
            //@ Cualquier valor es valido como contraseña
            if(!isset($_POST['contrasinalrep'])){
            array_push($errores, "contrasinalrep");
            
            }
            if(!isset($_POST['email'])){
            array_push($errores, "email");
            }

            if(isset($_POST['email'])){
                $email = $_POST['email'];
                if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    array_push($errores, "El formato de email no es correcto");
                }
            }
            //@ Valores validos para email: PEPITO@gmail.com, josefina@yahoo.com
            //@ Valores no validos para email(separados por comas): @jose@josefagmail@.com, 1234@1234987.com.@gmail,
            //@ Agargfunkel@yahoo@extremecom

            if(!isset($_POST['telefono'])){
            array_push($errores, "telefono");
            
            }

            if(isset($_POST['telefono'])){
                $numero = $_POST['telefono'];
                if(strlen($numero) === 9) {
                    if (!preg_match('/^[0-9]+$/',$numero)) { 
                        array_push($errores, "El formato del telefono no es correcto, solo debe tener numeros");
                }
            }
         
            else{
                array_push($errores, "El telefono es del tamaño incorrecto, debe de ser de 9 cifras");
            }
        }
            //@ Valores validos para telefono: 987654321, 654987321
            //@Valores no validos para telefono: lkandf2ql3jawidf, 89756321868975, gma21i4321qs
            if(!isset($_POST['valores'])){
            array_push($errores, "valores");
            
            }

            if(!isset($_POST['cajas'])){
            array_push($errores, "cajas");
            
            }
            if(!isset($_POST['nacimiento'])){
            array_push($errores, "nacimiento");
            
            }                
            if(!isset($_POST['textarea'])){
            array_push($errores, "textarea");
            
            }

            if(isset($_POST['textarea'])){
                $area = $_POST['textarea'];
                $areatrim = ltrim($area);
                if(!preg_match("/^[a-zA-Z]+$/", $areatrim)){
                array_push($errores, "El textarea contiene caracteres no permitidos");
                }
            }
            //@ Valores validos para el textarea: jkhwsidfunajekwnalsjkdflkjadfs, hola buenos dias mi nombre es pedro
            //@ Valores no validos para el textarea: lasfljkqwuoiasjlkfwqoiuzkjlcnvpuian098172349867wd, lansflkjn3987478w, h0la mi nombr3 es p3dr0

            if(!isset($_POST['username'])){
            array_push($errores, "username");
            
            }
            if(isset($_POST['username'])){
                $username = $_POST['username'];
                $nombretrim = ltrim($username);
                if(!preg_match("/^[a-zA-Z]+$/", $nombretrim)){
                    array_push($errores,"El nombre de usuario contiene caracteres no permitidos");
                }
            }

              //@ Valores validos para nombre: Pedro, ImVorte
             //@ Valores no validos para nombre: adsf41234, "X Æ A-12", @#~adefesio, 8754apepe, o83hara
            
            if(!isset($_POST['marcas'])){
            array_push($errores, "marcas");
            
            }
            if(!isset($_POST['ciudades'])){
            array_push($errores, "ciudades");
            }
            
            
             
            
           
    }
        //@ Si no hay errores y se ha enviado, imprime por pantalla un mensaje de todo correcto
        if(isset($_POST['enviar'])&& count($errores)==0){

                $introducir = [];
                $string = $_POST['nome'];
                $stringtrim = ltrim($string);
                array_push($introducir, $stringtrim);
                $string = $_POST['contrasinal'];
                $stringtrim = ltrim($string);
                array_push($introducir, $stringtrim);
                $string = $_POST['email'];
                $stringtrim = ltrim($string);
                array_push($introducir, $stringtrim);
                $string = $_POST['telefono'];
                $stringtrim = ltrim($string);
                array_push($introducir, $stringtrim);
                $valoresaa = implode( '-', $_POST['valores']);
                array_push($introducir, $valoresaa);
                $valoresaa = implode( '-', $_POST['cajas']);
                array_push($introducir, $valoresaa);
                $string = $_POST['nacimiento'];
                $stringtrim = ltrim($string);
                array_push($introducir, $stringtrim);
                $area = $_POST['textarea'];
                $areabuena = str_replace('"', "", $area);
                $areabuenatrim = ltrim($areabuena);
            
                array_push($introducir, $areabuenatrim);
                $string = $_POST['username'];
                $stringtrim = ltrim($string);
                array_push($introducir, $stringtrim);
                array_push($introducir, $_POST['marcas']);
                $valoresaa = implode( '-', $_POST['ciudades']);
                array_push($introducir, $valoresaa);
                
                array_push($datos, $introducir); 
                escribirCSV($archivo, $datos);
                
            
                ?>
                <table aria-describedby="Tabla rellena con datos de tablas.csv">
            <caption>Tabla de datos</caption>
            <?php 
            echo "<tr>";
            //@Imprimo la primera fila en la cabecera de la tabla
            for ($i=0; $i < count($cabecera); $i++) { 
                $variable = $cabecera[$i];
                echo "<th>$variable</th>";
            }
            echo "</tr>";
            //@ Usando un bucle for dentro de otro, imprimo todos los elementos del archivo en distintas filas de la tabla
            for ($i=1; $i < count($datos); $i++) { 
                $fila = $datos[$i];
                echo "<tr>";
                for ($j=0; $j < count($fila); $j++) { 
                    $variable = $fila[$j];
                    echo "<td>$variable</td>";
                }
                echo "</tr>";
            }
            ?>
            </table> 
            </br>
                <a href="formulario.php"> Volver al formulario de registro</a>
            <?php


        }
        //@ Si hay errores o no se ha enviado, se imprime una lista de errores y el formulario

        else{
            
            ?>


            <table aria-describedby="Tabla rellena con datos de tablas.csv">
                <caption>Tabla de datos</caption>
                <?php 
                echo "<tr>";
                //@Imprimo la primera fila en la cabecera de la tabla
                for ($i=0; $i < count($cabecera); $i++) { 
                    $variable = $cabecera[$i];
                    echo "<th>$variable</th>";
                }
                echo "</tr>";
                //@ Usando un bucle for dentro de otro, imprimo todos los elementos del archivo en distintas filas de la tabla
                for ($i=1; $i < count($datos); $i++) { 
                    $fila = $datos[$i];
                    echo "<tr>";
                    for ($j=0; $j < count($fila); $j++) { 
                        $variable = $fila[$j];
                        echo "<td>$variable</td>";
                    }
                    echo "</tr>";
                }

                ?>

            </table>

            <br> 


                <?php 
                if(count($errores)!=0){
                    echo "<div id='caja'>";
                    echo "<h1>Faltan los siguientes datos.</h1>";
                    for ($i=0; $i< count($errores); $i++) { 
                        echo $errores[$i];
                        echo "</br>";
                }
                echo "</div>";
                }
                ?>

            <br> <br>
                

                    <form name="formulario" action='formulario.php' method="post">
                        <label> Nombre de Usuario </label> <input type="text" name="nome" value="<?php if(isset($_POST['nome'])) echo $_POST['nome'] ?>" required/> </br></br>
                    
                    
                        <label> Contraseña </label> <input type="password" name="contrasinal" value="<?php if(isset($_POST['contrasinal'])) echo $_POST['contrasinal'] ?>" required/></br></br>
                    
                    

                        <label> Confirme la Contraseña </label> <input type="password" name="contrasinalrep" value="<?php if(isset($_POST['contrasinalrep'])) echo $_POST['contrasinalrep'] ?>" required/></br></br>
                    

                        <label> Correo Electronico </label> <input type="email" name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email'] ?>" required/></br></br>
                    
                    

                        <label> Telefono </label> <input type="tel" name="telefono" value="<?php if(isset($_POST['telefono'])) echo $_POST['telefono'] ?>" required/></br></br>
                    
                    

                        <fieldset>
                        <legend> radioButtons </legend>
                            <input type="radio" id="valor1" name="valores[]" value="valor1" <?php if(isset($_POST['valores'])&& in_array("valor1", $_POST['valores'])) echo "checked"; ?> >
                            <label for="valor1">Opcion 1</label><br>


                            <input type="radio" id="valor2" name="valores[]" value="valor2" <?php if(isset($_POST['valores'])&& in_array("valor2", $_POST['valores'])) echo "checked"; ?>>
                            <label for="valor2">Opcion 2</label><br>
                            <input type="radio" id="valor3" name="valores[]" value="valor3" <?php if(isset($_POST['valores'])&& in_array("valor3", $_POST['valores'])) echo "checked"; ?> >
                            <label for="valor3">Opcion 3</label></br></br>
                        </fieldset>


                        <fieldset>
                        <legend> CheckBoxes </legend>
                            <input type="checkbox" id="checkbox1" name="cajas[]" value="cajas1"
                            
                            
                            <?php if(isset($_POST['cajas']) 
                            && in_array("cajas1", $_POST['cajas'])) echo "checked"; 
                            
                            ?>
                            >
                            
                            
                            <label for="checkbox1"> Checkbox 1</label><br>

                            <input type="checkbox" id="checkbox2" name="cajas[]" value="cajas2" 
                            <?php if(isset($_POST['cajas']) 
                            && in_array("cajas2", $_POST['cajas'])) echo "checked"; 
                            
                            ?>
                            >
                            <label for="checkbox2"> Checkbox 2</label><br>
                            <input type="checkbox" id="checkbox3" name="cajas[]" value="cajas3"
                            <?php if(isset($_POST['cajas']) 
                            && in_array("cajas3", $_POST['cajas'])) echo "checked"; 
                            
                            ?>
                            >
                            <label for="checkbox3"> checkbox 3</label></br></br>
                        </fieldset>

                    

                        <label> Fecha de Nacimiento </label> <input type="date" name="nacimiento" value="<?php if(isset($_POST['nacimiento'])) echo $_POST['nacimiento'] ?>" required/></br></br>
                        
                    

                        <label> TextArea </label> <textarea name="textarea" required> <?php if(isset($_POST['textarea'])) echo $_POST['textarea'] ?></textarea></br></br>
                    
                    

                        <label> Nombre de Usuario </label> <input type="text" name="username" value="<?php if(isset($_POST['username'])) echo $_POST['username'] ?>" required/></br></br>
                        
                        

                        <label for="lang">Desplegable</label>
                        <select name="marcas" id="lang">
                            <option value="opel" <?php if(isset($_POST['marcas'])&& strcasecmp("opel", $_POST['marcas'])) echo "selected"; ?>>opel</option>
                            <option value="ferrari"  <?php if(isset($_POST['marcas'])&& strcasecmp("ferrari", $_POST['marcas'])) echo "selected"; ?>>ferrari</option>
                            <option value="ford"  <?php if(isset($_POST['marcas'])&& strcasecmp("ford", $_POST['marcas'])) echo "selected"; ?>>ford</option>
                            <option value="audi"  <?php if(isset($_POST['marcas'])&& strcasecmp("audi", $_POST['marcas'])) echo "selected"; ?>>audi</option>
                        </select> </br></br>
                    
                            <label for="lang">No Desplegable</label>
                        <select name="ciudades[]" multiple="yes" size="3">

                            <option value="newyork" <?php if(isset($_POST['ciudades'])&& in_array("newyork", $_POST['ciudades'])) echo "selected"; ?>>New York </option>
                            <option value="bucharest" <?php if(isset($_POST['ciudades'])&& in_array("bucharest", $_POST['ciudades'])) echo "selected"; ?>>Bucharest</option>
                            <option value="madrid" <?php if(isset($_POST['ciudades'])&& in_array("madrid", $_POST['ciudades'])) echo "selected"; ?>>Madrid</option>

                        </select> <br />
                    

                        <input type="submit" name = 'enviar' value="enviar"/></br></br>

                        <input type="reset" name = 'reset' value="resetear"/></br></br>




                    </form>
                    <?php
        }
        ?>


    </body>
    </html>