<?php
//! Funcion para leer el archivo CSV
function leerCSV($archivo)
{
    $arrayDatos = array();
    if ($fp = fopen($archivo, "r")) {
        while ($filaDatos = fgetcsv($fp, 0, ",")) {
            $arrayDatos[] = $filaDatos;
        }
    } else {
        echo "Error, no se puede acceder al archivo " . $archivo . "<br>";
        return false;
    }
    fclose($fp);
    return $arrayDatos;
} //! Funcion para escribir en el CSV
function escribirCSV($archivo, $arrayEscribir)
{
    if ($fp = fopen($archivo, "w")) {
        foreach ($arrayEscribir as $filaDatos) {
            fputcsv($fp, $filaDatos);
        }
    } else {
        echo "Error, no se pudo abrir el archivo";
        return false;
    }
    fclose($fp);
    return true;
}
