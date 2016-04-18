<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Departamento
 *
 * @author fabio
 */
class Departamento {
    public $iddepartamento;
    public $nombre;
    
    function getIddepartamento() {
        return $this->iddepartamento;
    }

    function getNombre() {
        return $this->nombre;
    }

    function setIddepartamento($iddepartamento) {
        $this->iddepartamento = $iddepartamento;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }


    
}
