<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Municipio
 *
 * @author fabio
 */
class Municipio {
    
    public $idmunicipio;
    public $nombreMunicipio;
    public $departamento_iddepartamento;
    
    function getIdmunicipio() {
        return $this->idmunicipio;
    }

    function getNombreMunicipio() {
        return $this->nombreMunicipio;
    }

    function getDepartamento_iddepartamento() {
        return $this->departamento_iddepartamento;
    }

    function setIdmunicipio($idmunicipio) {
        $this->idmunicipio = $idmunicipio;
    }

    function setNombreMunicipio($nombreMunicipio) {
        $this->nombreMunicipio = $nombreMunicipio;
    }

    function setDepartamento_iddepartamento($departamento_iddepartamento) {
        $this->departamento_iddepartamento = $departamento_iddepartamento;
    }


    
}
