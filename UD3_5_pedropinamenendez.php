<?php


/*
	* Título: Tarefa 3 - 5

	* Autor:Pedro Pina Menéndez

    * Data modificación: 26/10/2022
    * Versión 2.0



*/


//*Primero creo una funcion para crear colores aleatorios

function rand_color() {
    return sprintf('#%06X', mt_rand(0, 0xFFFFFF));
}


//*Creo la funcion para imprimir el arcoiris, pasandole como parametro el numero de arcos que va a tener
function arcoiris($numero){
	

//*mediante un bucle for, voy creando arcos cada vez mas pequeños, y pasandoles colores aleatorios
for ($i = 0; $i < $numero; $i++) {

	$color = rand_color();
	
	$divisor = 10-$i;
	$altura = $divisor*20;
	$alturapx = $altura . "px";
	$gordura = $divisor*40;
	$gordurapx = $gordura . "px";
	//*El ultimo arco tendra que ser blanco

	if($i==$numero-1){
		$color="white";
	}


    echo "<div style ='background-color:$color;
	 height:$alturapx;
 	 width: $gordurapx;
 	 top: 20px;
  	 left: 20px;
	 border-radius: 275px 275px 0 0;
	 position: relative;'>";

	
}
//*Por ultimo cierro todos los bucles
for ($i = 1; $i <= $numero; $i++) {
	echo "</div>";
}
}
   



$cantidad = rand(3,10);

arcoiris($cantidad);







?>