<?php

 /*

    Título: Tarefa 1-2 - 3 Comezando con PHP

    Autor:Pedro Pina Menéndez

    Data modificación: 22/09/2022
    Versión 1.0

*/


//punto 1, creo con define la constante, y la muestro con echo
	define('saludo','bienvenido a la pagina');
	$nombre = "Mazorca";

	echo "<span>hola, ".saludo.", $nombre</span>";

//punto 2,creo la constante utilizando define, luego la utilizo con un echo para cargarla en un h1

define('titulo','ejercicio 1 pedro pina');
echo "<h1 style = 'color:red; font-size:90px;font-family:Arial;'>".titulo."</h1>";

//apartado 3, guardo el enlace en una variable y usando printf la abro tanto en el title como en una etiqueta 
$enlace = "https://awbw.amarriner.com/";


printf("<a href=$enlace target='_blank'>$enlace </a>");
printf("<title> $enlace </title>");

//apartado 4, guardo los numeros en variables, los sumo, luego divido el resultado por dos, y de ahi saco la media. Luego, la divido entre el numero real.
$entera1=21;
$entera2=56;
$resto=($entera1+$entera2)/2;
$real=12.5;
$resultado = $resto/$real;
$resultadoimprimir=number_format($resultado, 2);

echo "<h3> la ecuacion usada fue (entero1+entero2)/real, y el resultado es: ".$resultado."</h3>";


//apartado 5, utilizando rand() creo 3 numeros aleatorios. Despues, con las funciones decbin y dechex, paso esos numeros a binario y hexadecimal respectivamente, y los muestro con echo en la tabla
$num1 = rand();
$num2 = rand();
$num3 = rand();
$bin1=decbin($num1);
$bin2=decbin($num2);
$bin3=decbin($num3);
$hex1=dechex($num1);
$hex2=dechex($num2);
$hex3=dechex($num3);
?>

<h4> conversor </h4>

<table border="1">
  <tr>
    <th></th>
    <th><?php echo $num1 ?></th>
    <th><?php echo $num2 ?></th>
    <th><?php echo $num3 ?></th>
  </tr>
  <tr>
    <td>Decimal</td>
    <td><?php echo $num1 ?></td>
    <td><?php echo $num2 ?></td>
    <td><?php echo $num3 ?></td>
  </tr>
  <tr>
    <td>Binary</td>
    <td><?php echo $bin1 ?></td>
    <td><?php echo $bin2 ?></td>
    <td><?php echo $bin3 ?></td>
  </tr>
  <tr>
    <td>Hexadecimal</td>
    <td><?php echo $hex1 ?></td>
    <td><?php echo $hex2 ?></td>
    <td><?php echo $hex3 ?></td>
  </tr>
</table>

<?php
//apartado 6, creo dos variables con dos strings que sean colores aceptables, y despues con echo los meto en las etiquetas style de cada tabla.


$color1="green";
$color2="pink";




?>
<h4> conversor </h4>
<table border="1">
  <tr style="background-color:<?php echo $color1 ?>">
    <th></th>
    <th><?php echo $num1 ?></th>
    <th><?php echo $num2 ?></th>
    <th><?php echo $num3 ?></th>
  </tr>
  <tr style="background-color:<?php echo $color2 ?>">
    <td>Decimal</td>
    <td><?php echo $num1 ?></td>
    <td><?php echo $num2 ?></td>
    <td><?php echo $num3 ?></td>
  </tr>
  <tr style="background-color:<?php echo $color1 ?>">
    <td>Binary</td>
    <td><?php echo $bin1 ?></td>
    <td><?php echo $bin2 ?></td>
    <td><?php echo $bin3 ?></td>
  </tr>
  <tr style="background-color:<?php echo $color2 ?>">
    <td>Hexadecimal</td>
    <td><?php echo $hex1 ?></td>
    <td><?php echo $hex2 ?></td>
    <td><?php echo $hex3 ?></td>
  </tr>
</table>



<?php 

//Apartado 7:con rand() consigo un precio aleatorio, despues creo una funcion que multiplique ese numero por 1.21, y luego le hace return, y luego en un echo muestro el dato
$precio = rand();

function iva(){
global $precio;
$preciotot= $precio*1.21;
return $preciotot;
};
$preciomostrar=iva();
echo "<p>el precio original es ".$precio."</p>";

echo "<p>el precio es ".$preciomostrar."</p>";




?>
<!--Apartado 8: Despues de crear las hojas de css(llamadas hoja1.css y hoja2.css), utilizo un echo para clarificar que hoja es, y poder cambiarlas rapidamente-->
<head> <link rel="stylesheet" href="hoja<?php echo "1"?>.css" type="text/css"/> </head> 
























