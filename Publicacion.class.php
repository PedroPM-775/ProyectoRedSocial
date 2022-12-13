<?php
class Publicacion
{

    private $codigo;
    private $titulo;
    private $texto;
    private $multimedia;
    private $dataPublicacion;
    private $userName;



    //@ Getters
    public function getCodigo()
    {
        return $this->codigo;
    }
    public function getTitulo()
    {
        return $this->titulo;
    }
    public function getTexto()
    {
        return $this->texto;
    }
    public function getMultimedia()
    {
        return $this->multimedia;
    }
    public function getDataPublicacion()
    {
        return $this->dataPublicacion;
    }
    public function getuserName()
    {
        return $this->userName;
    }

    //@ Setters
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }
    public function setTexto($texto)
    {
        $this->texto = $texto;
    }
    public function setMultimedia($multimedia)
    {
        $this->multimedia = $multimedia;
    }
    public function setDataPublicacion($dataPublicacion)
    {
        $this->dataPublicacion = $dataPublicacion;
    }
    public function setuserName($userName)
    {
        $this->userName = $userName;
    }

    public function __construct($codigoN, $tituloN, $textoN, $multimediaN, $dataPublicacionN, $userNamen)
    {
        //@ Funcion para crear una publicacion
        $this->setCodigo($codigoN);
        $this->setTitulo($tituloN);
        $this->setTexto($textoN);
        $this->setMultimedia($multimediaN);
        $this->setDataPublicacion($dataPublicacionN);
        $this->setuserName($userNamen);
    }

    public function publicado()
    {
        $fechaobjeto = strtotime($this->getDataPublicacion());
        $fechaActual = strtotime(date_default_timezone_get());
        if ($fechaobjeto < $fechaActual) {
            return true;
        } else {
            return false;
        }
    }

    public function seguridade($nivel)
    {
        switch ($nivel) {
            case 0:
                $this->setTexto(strip_tags($this->getTexto()));
                break;

            case 1:
                $this->setTexto(strip_tags($this->getTexto(), "<h1>, <h2>, <h3>, <p>"));
                break;

            case 2:
                break;
        }
    }


    public function moderar()
    {
        $DAO = new DAO();
        $datos = $DAO->leerCsvPalabras();
        $palabras = $datos[0];
        for ($i = 0; $i < count($palabras); $i++) {
            $this->setTexto(str_ireplace($palabras[$i], "*****", $this->getTexto()));
        }
    }
}
