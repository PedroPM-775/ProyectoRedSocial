<?php

 /*

    Título: Tarefa 3 - 1 Exercicios básicos con Strings, Datas, Condicionais e Bucles 

    Autor:Pedro Pina Menéndez

    Data modificación: 29/09/2022
    Versión 1.0

*/


//punto 1, creo con define la constante, y la muestro con echo
	$string = "pedropinamenendez@gmail.com";
	if(str_contains( $string, '@')){
		
		if(str_contains($string, '.')){

			echo "<h1> lo tiene </h1>";
			$posarr= stripos($string, '@');
			$pospun= stripos($string, '.');
			$cuenta = substr($string, 0, $posarr);
			echo "<h1>".$cuenta."</h1>";
			$dominio = substr($string, $posarr+1);
			echo "<h1>".$dominio."</h1>";

		} else{
			echo "<h1>error, no tiene punto </h1>";
			}
	}else{
		echo "<h1>error, no tiene @</h1>";
}



?>

<!--Apartado 1.2-->

<?php

$letra = "Age of aquariOus";

	$letra = str_replace("a", '4', $letra);
	$letra = str_replace("e", '3', $letra);
	$letra = str_replace("i", '1', $letra);
	$letra = str_replace("o", '0', $letra);
	$letra = str_replace("A", '<span style="font-size:40px;">4</span>', $letra);
	$letra = str_replace("E", '<span style="font-size:40px;">3</span>', $letra);
	$letra = str_replace("I", '<span style="font-size:40px;">1</span>', $letra);
	$letra = str_replace("O", '<span style="font-size:40px;">0</span>', $letra);

echo "$letra";


?>


<!--Apartado 2.1-->

	<footer>
	<p>&#169; <?php echo date("Y"); ?></p>

	</footer> 

<!--Apartado 2.2-->
	<?php 
	$hoy = date('F l, Y');
	?>
	<p><?php echo "$hoy" ?></p>




<!--Apartado 2.3-->
	<?php

	$fecha1 = strtotime("2022-01-06");
	$fecha2 = strtotime("now");
	$fechadif = $fecha2 - $fecha1;
	$numsemanas = intdiv($fechadif, 604800);
	echo "<p> han pasado $numsemanas semanas </p>";
	?>


<!--Apartado 2.4-->


	<?php 
		function viernes($dia){
		$fecha = date('N', $dia);
		if($fecha == 5){

		return true;
		}
		else{
		return false;

		}
		}

	$fecha3 = strtotime("2022-01-06");
	viernes($fecha3);

	?>


<!--Apartado 3.1-->
	<?php 
		function saudar($hora){
		$horario = date('G', $hora);

		if(($horario <= 12)&&($horario >=4)){

		echo "<p>buenos dias</p>";
		}
		else if(($horario > 12)&&($horario <=19)){
		echo "buenas tardes";

		}
		else{
		echo"buenas noches";
		}
		}
	$horapar = strtotime("now");
	saudar($horapar);

	?>

<!--Apartado 3.2-->

		<?php 
		function contarletras($frase){
		$caracteres = str_split($frase);
		$contadora=0;
		$contadore=0;
		$contadori=0;
		$contadoro=0;
		$contadoru=0;
		$contadornum=0;
		$contadorextra=0;
		$contador = count($caracteres);

		for($i=0;$i<$contador;$i++){

			if((strcmp($caracteres[$i], 'a') == 0)){
			$contadora++;

			}
			else if((strcmp($caracteres[$i], 'e') == 0)){
			$contadore++;

			}
			else if((strcmp($caracteres[$i], 'i') == 0)){
			$contadori++;

			}
			else if((strcmp($caracteres[$i], 'o') == 0)){
			$contadoro++;

			}
			else if((strcmp($caracteres[$i], 'u') == 0)){
			$contadoru++;

			}
			else if((strcmp($caracteres[$i], '0') == 0)||(strcmp($caracteres[$i], '1') == 0)
			||(strcmp($caracteres[$i], '2') == 0)||(strcmp($caracteres[$i], '3') == 0)||(strcmp($caracteres[$i], '4') == 0)
			||(strcmp($caracteres[$i], '5') == 0)||(strcmp($caracteres[$i], '6') == 0)||(strcmp($caracteres[$i], '7') == 0)
			||(strcmp($caracteres[$i], '8') == 0)||(strcmp($caracteres[$i], '9') == 0)){
			$contadornum++;

			}
			else{
			$contadorextra++;
			}

		}
		echo "<p>hay $contadora as</p>";
		echo "<p>hay $contadore is</p>";
		echo "<p>hay $contadori os</p>";
		echo "<p>hay $contadoro es</p>";
		echo "<p>hay $contadoru us</p>";
		echo "<p>hay $contadornum numeros</p>";
		echo "<p>hay $contadorextra caracteres diferentes</p>";
		}


		$frase ="Hola, me llamo pedro, y tengo un murcielago y 45 sets de 50 sentadillas con 120 kilos";
		contarletras($frase);

		?>


<!--Apartado 4.1-->

	<?php

		function potencias($base, $exponente){

			for($i=1; $i<=$exponente; $i++){
			$ejemplo = pow($base, $i);
			echo "<p>$ejemplo</p>";

			}


		}
	potencias(5, 3);


	?>

<!--Apartado 4.2-->

	<?php

		$contraseña = 4251;

			function testeo($contraseña){

				$primer = 0;
				$coinciden = false;

				while(!$coinciden){
				$primer++;

				if($primer == $contraseña){
				$coinciden = true;
				}

				}
				echo "la contraseña es ".$primer;
			}
	testeo($contraseña);
	?>








