<?php

/*

    Título: Tarefa 3 - 4

    Autor:Pedro Pina Menéndez

    Data modificación: 05/10/2022
    Versión 1.0

*/

$herbivoros = array(
	//creo un array donde relaciono indices con los emoticonos de los herbivoros
	0 => "\u{1F986}", 1 => "\u{1F404}", 2 => "\u{1F416}",
	3 => "\u{1F400}", 4 => "\u{1F410}",
	5 => "\u{1F983}", 6 => "\u{1F40C}"
);


$carnivoros = array(
	//creo un array donde relaciono indices con los emoticonos de los carnivoros
	0 => "\u{1F43A}", 1 => "\u{1F985}", 2 => "\u{1F40D}"
);
echo "<h1>CADEA TROFICA</h1>";

$comida = array(
	//creo un array donde relaciono indices con los emoticonos de los herbivoros que se comen los carnivoros

	0 => array("\u{1F416}", "\u{1F404}", "\u{1F410}"),

	1 => array("\u{1F986}", "\u{1F400}", "\u{1F983}"),

	2 => array("\u{1F400}", "\u{1F40C}", "\u{1F986}")

);



echo "<h3>Herbivoros</h3>";
echo "<h1>" . implode(" ", $herbivoros) . "</h1>";
echo "<h3>Carnivoros</h3>";
echo "<h1>" . implode(" ", $carnivoros) . "</h1>";
echo "<h3>Escollidos: </h3>";

$indicecar = rand(0, 2);
$indiceher = rand(0, 6);

$condicional = false;
$encontrado = false;
//Utilizando un bucle while para repetirlo tantas veces como haga falta, compruebo si el herbivoro seleccionado al azar
//esta en la lista de comer del carnivoro seleccionado.
while (!$condicional) {

	for ($i = 0; $i < 3; $i++) {
		if ($comida[$indicecar][$i] == $herbivoros[$indiceher]) {
			$encontrado = true;
			$condicional = true;
		}
	}
	$condicional = true;
}
//imprimo el resultado.
if ($encontrado == true) {
	echo "<h1 style='font-size:60px'>" . $carnivoros[$indicecar] . " come a " . $herbivoros[$indiceher] . "</h1>";
} else {
	echo "<h1 style='font-size:60px'>" . $carnivoros[$indicecar] . " no come a " . $herbivoros[$indiceher] . "</h1>";
}
