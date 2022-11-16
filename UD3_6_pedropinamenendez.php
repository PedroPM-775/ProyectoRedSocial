<?php

/*

    Título: Tarefa 3 - 6

    Autor:Pedro Pina Menéndez

    Data modificación: 06/10/2022
    Versión 1.0 

*/

	

function crearbaraja(){

	$baraja = array();
	$palos = array("b", "c", "e", "o");

	foreach ($palos as $valor) {

		for($j = 1; $j<11; $j++){
			$relleno = $j.$valor;
			array_push($baraja, $relleno);
		}

	}	
	
	

	shuffle($baraja);
	$devuelto = array();
//echo '<pre>'; print_r($baraja); echo '</pre>';
	return $baraja;
}



function repartir($baraja){
	
	$manojugador = array();
	for($i=0;$i<7; $i++){
	array_push($manojugador, $baraja[count($baraja)-1]);
	array_pop($baraja);
	}
	sort($manojugador);

	shuffle($baraja);
	$devuelto = array($baraja, $manojugador);
	return $devuelto;
}

$barajaa = crearbaraja();
$devuelto = array();
$devuelto = repartir($barajaa);
$manojugador1 = $devuelto[1];
$barajaa = $devuelto[0];
repartir($barajaa);
$devuelto = repartir($barajaa);
$manojugador1 = $devuelto[1];
$barajaa = $devuelto[0];















?>