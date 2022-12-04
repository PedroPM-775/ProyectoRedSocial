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

    public function __construct($codigoN, $tituloN, $textoN, $multimediaN, $userNamen)
    {
        //@ Funcion para crear una publicacion
        $this->setCodigo($codigoN);
        $this->setTitulo($tituloN);
        $this->setTexto($textoN);
        $this->setMultimedia($multimediaN);
        $this->setDataPublicacion(date_default_timezone_get());
        $this->setuserName($userNamen);
    }


    public function crearPublicacion($codigoN, $tituloN, $textoN, $multimediaN, $userNamen)
    {
        //@ Funcion para crear una publicacion
        $this->setCodigo($codigoN);
        $this->setTitulo($tituloN);
        $this->setTexto($textoN);
        $this->setMultimedia($multimediaN);
        $this->setDataPublicacion(date_default_timezone_get());
        $this->setuserName($userNamen);
    }


    public function programarPublicacion($dataHora)
    {
        $this->setDataPublicacion($dataHora);
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
    }

    public function moderacion()
    {
    }

    public function imprimirPublicacion()
    {

        echo " <div class = 'cajapost'>
        <img class ='imagenpost' src='";
        if (isset($_SESSION['usuario'])) {
            $nombrefoto = "fotos/foto_" . $_SESSION['usuario'] . ".jpg";
            if (file_exists($nombrefoto)) {

                echo $nombrefoto;
            } else {
                echo "fotos/default.png";
            }
        } else {
            echo "fotos/default.png";
        }
        echo "'> <a id='nombreusuario'>";
        echo $this->getuserName();


        echo "</a>
            <h3 class ='titulo'>";
        echo $this->getTitulo();
        echo "</h3>
             <p class ='contenido'>";
        echo $this->getTexto();
        echo "</p>
    </div>";
    }
    public function almacenarPublicacion()
    {
        //@ Funcion para meter la publicacion en el csv
        $archivo = "publicaciones.csv";
        $objeto = array();
        array_push($objeto, $this->getCodigo());
        array_push($objeto, $this->getTitulo());
        array_push($objeto, $this->getTexto());
        array_push($objeto, $this->getMultimedia());
        array_push($objeto, $this->getDataPublicacion());
        array_push($objeto, $this->getuserName());
        escribirCSV($archivo, $objeto);
    }
}
