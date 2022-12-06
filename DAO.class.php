<?php

class DAO
{
    private $rutafichero;


    public function getruta()
    {
        return $this->rutafichero;
    }
    public function setRuta($ruta)
    {
        $this->rutafichero = $ruta;
    }

    public function __construct($ruta)
    {
        $this->setRuta($ruta);
    }

    function leerCSV()
    {
        $arrayDatos = array();
        if ($fp = fopen($$this->rutafichero, "r")) {
            while ($filaDatos = fgetcsv($fp, 0, ",")) {
                $arrayDatos[] = $filaDatos;
            }
        } else {
            echo "Error, no se puede acceder al archivo " . $this->rutafichero . "<br>";
            return false;
        }
        fclose($fp);
        return $arrayDatos;
    } //! Funcion para escribir en el CSV


    function escribirCSV($arrayEscribir)
    {
        if ($fp = fopen($this->r, "w")) {
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
}
