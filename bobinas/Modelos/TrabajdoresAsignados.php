<?php


class TrabajdoresAsignados {

    private $Id;
    private $Idjefe;
    private $Idempleado;
    
    function getId() {
        return $this->Id;
    }

    function getIdjefe() {
        return $this->Idjefe;
    }

    function getIdempleado() {
        return $this->Idempleado;
    }

    function setId($Id) {
        $this->Id = $Id;
    }

    function setIdjefe($Idjefe) {
        $this->Idjefe = $Idjefe;
    }

    function setIdempleado($Idempleado) {
        $this->Idempleado = $Idempleado;
    }


    
}
