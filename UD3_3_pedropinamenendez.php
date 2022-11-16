<?php

/*

    Título: Tarefa 3 - 3

    Autor:Pedro Pina Menéndez

    Data modificación: 04/10/2022
    Versión 1.0

*/




?>


	<?php
		$colorsemana = "#ADD8E6";
		$colorfinsemana = "#48D1CC";
	?>
<!--Primero imprimo la cabecera de la tabla -->
		<table>
		<tr>
		<th><?php echo "<div > Lunes</div>"; ?></th>
		<th><?php echo "<div > Martes</div>"; ?></th>
		<th><?php echo "<div> Miercoles</div>"; ?></th>
		<th><?php echo "<div> Jueves</div>"; ?></th>
		<th><?php echo "<div> Viernes</div>"; ?></th>
		<th><?php echo "<div> Sabado</div>"; ?></th>
		<th><?php echo "<div> Domingo</div>"; ?></th>
		</tr>

	<?php
	//creo las variables necesarias para el algoritmo usado en la tabla 
	$filas = 5;
	$columnas = 6;
	$dia = 1;
	//este bucle for ira imprimiento filas, y creando la primera celda de la fila
	for ($i = 1; $i <= $filas; $i++) {

		print " <tr>"; 
		print " <td style='background-color:$colorsemana'>" . $dia . " </td>";
		$dia++;
		//este bucle for ira imprimiendo las demas celdas de cada fila, y segun que numero de columna use, le pondra un color de fondo u otro. En caso de pasar el dia 31, imprime
		//celdas vacias.
		for ($j = 1; $j <= $columnas; $j++) {

			if($dia<=31){

				switch($j){
					default:
					$color = $colorsemana;
					break;
					case 5:

					case 6:
					$color = $colorfinsemana;
					break;
				}

				print " <td style='background-color:$color'>" . $dia . "</td>";
				$dia++;
				}
				else{
				print " <td></td>";
				}

			}
		print " </tr>";
	}
	?>
</tbody> </table>