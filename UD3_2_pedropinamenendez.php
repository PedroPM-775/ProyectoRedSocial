
<?php

/*

    * Título: Tarefa 3 - 2

    * Autor:Pedro Pina Menéndez

    * Data modificación: 26/10/2022
    
	* Versión 2.0

*/
//* Primero creo el array de numeros aleatorios.


function numerosAleatorios()
{
	//* Creo un array de 5000 numeros que no se repiten, tomo los 1000 primeros y los meto en otro array, sorteo ese array y lo devuelvo
	$limite = range(0, 5000);
	shuffle($limite);
	$arrayrandom = array_slice($limite, 0, 1000);
	sort($arrayrandom);
	return $arrayrandom;
}




//* Creo la funcion para recorrer el array, y comprobar si el numero se encuentra dentro del array
//* Si el numero existe, la funcion devuelve null, y si existe devuelve el indice del numero

function buscar($arrayrandom, $numero)
{
	$tamaño = count($arrayrandom) - 1;
	$bucle = false;
	$indice = 0;

	while (!$bucle) {
		if ($indice == $tamaño) {
			return null;
		}

		$a = $arrayrandom[$indice];
		echo "<p>$a</p>";

		if ($a > $numero) {
			return null;
		} else if ($a == $numero) {
			return $indice;
		} else {
			$indice++;
		}
	}
}
$array = numerosAleatorios();

$numero = 40;
$indicador = buscar($array, $numero);
//* Si la funcion devuelve null, imprime que no esta, y si devuelve un indice lo imprime
if (!$indicador) {
	echo "El numero no esta en el array";
} else {
	echo "el numero esta en la posicion $indicador";
}

?>
