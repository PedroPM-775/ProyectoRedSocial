<?php

class Usuario
{

    private $nombre;
    private $contrasena;
    private $correo;
    private $telefono;
    private $valores;
    private $cajas;
    private $nacimiento;
    private $descripcion;
    private $username;
    private $genero;
    private $servidor;
    private $rol;



    //@ Getters
    public function getNombre()
    {
        return $this->nombre;
    }
    public function getContrasena()
    {
        return $this->contrasena;
    }
    public function getCorreo()
    {
        return $this->correo;
    }
    public function getTelefono()
    {
        return $this->telefono;
    }
    public function getValores()
    {
        return $this->valores;
    }
    public function getCajas()
    {
        return $this->cajas;
    }
    public function getNacimiento()
    {
        return $this->nacimiento;
    }
    public function getDescripcion()
    {
        return $this->descripcion;
    }
    public function getuserName()
    {
        return $this->username;
    }
    public function getGenero()
    {
        return $this->genero;
    }
    public function getServidor()
    {
        return $this->servidor;
    }
    public function getRol()
    {
        return $this->rol;
    }


    //@ Setters
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function setContrasena($contrasena)
    {
        $this->contrasena = $contrasena;
    }
    public function setCorreo($correo)
    {
        $this->correo = $correo;
    }
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }
    public function setValores($valores)
    {
        $this->valores = $valores;
    }
    public function setCajas($cajas)
    {
        $this->cajas = $cajas;
    }
    public function setNacimiento($nacimiento)
    {
        $this->nacimiento = $nacimiento;
    }
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }
    public function setuserName($username)
    {
        $this->username = $username;
    }
    public function setGenero($genero)
    {
        $this->genero = $genero;
    }
    public function setServidor($servidor)
    {
        $this->servidor = $servidor;
    }
    public function setRol($rol)
    {
        $this->rol = $rol;
    }


    //@ Metodos de verdad
    public function __construct($nombre, $contrasena, $correo, $telefono, $valores, $cajas, $nacimiento, $descripcion, $username, $genero, $servidor, $rol)
    {
        $this->setNombre($nombre);
        $this->setContrasena($contrasena);
        $this->setCorreo($correo);
        $this->setTelefono($telefono);
        $this->setValores($valores);
        $this->setCajas($cajas);
        $this->setNacimiento($nacimiento);
        $this->setDescripcion($descripcion);
        $this->setuserName($username);
        $this->setGenero($genero);
        $this->setServidor($servidor);
        $this->setRol($rol);
    }


    public function Admin()
    {
        if ($this->rol == 'Administrador') {
            return true;
        } else {
            return false;
        }
    }
}
