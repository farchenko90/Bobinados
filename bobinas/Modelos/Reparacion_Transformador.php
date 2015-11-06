<?php


class Reparacion_Transformador {

    private $Id_repa;
    private $Largo_repa;
    private $Ancho_repa;
    private $Altu_repa;
    private $Refri_repa;
    private $Tipo_conductor;
    private $Bisel_repa;
    private $Fibra_repa;
    private $Bobinas;
    private $Cali_repa;
    private $N2;
    private $Otros_repa;
    private $Nsecuencia;
    private $Potencia;
    private $Vprimario;
    private $Vsegundario;
    private $Tipo;
    private $Estado;
    private $Idtran_repa;
    
    function getEstado() {
        return $this->Estado;
    }

    function setEstado($Estado) {
        $this->Estado = $Estado;
    }
    
    function getNsecuencia() {
        return $this->Nsecuencia;
    }

    function getPotencia() {
        return $this->Potencia;
    }

    function getVprimario() {
        return $this->Vprimario;
    }

    function getVsegundario() {
        return $this->Vsegundario;
    }

    function setNsecuencia($Nsecuencia) {
        $this->Nsecuencia = $Nsecuencia;
    }

    function setPotencia($Potencia) {
        $this->Potencia = $Potencia;
    }

    function setVprimario($Vprimario) {
        $this->Vprimario = $Vprimario;
    }

    function setVsegundario($Vsegundario) {
        $this->Vsegundario = $Vsegundario;
    }
        
    function getTipo() {
        return $this->Tipo;
    }

    function setTipo($Tipo) {
        $this->Tipo = $Tipo;
    }
        
    function getBobinas() {
        return $this->Bobinas;
    }

    function setBobinas($Bobinas) {
        $this->Bobinas = $Bobinas;
    }
        
    function getN2() {
        return $this->N2;
    }

    function setN2($N2) {
        $this->N2 = $N2;
    }
    
    function getId_repa() {
        return $this->Id_repa;
    }

    function getLargo_repa() {
        return $this->Largo_repa;
    }

    function getAncho_repa() {
        return $this->Ancho_repa;
    }

    function getAltu_repa() {
        return $this->Altu_repa;
    }

    function getRefri_repa() {
        return $this->Refri_repa;
    }

    function getTipo_conductor() {
        return $this->Tipo_conductor;
    }

    function getBisel_repa() {
        return $this->Bisel_repa;
    }

    function getFibra_repa() {
        return $this->Fibra_repa;
    }

    function getCali_repa() {
        return $this->Cali_repa;
    }

    function getOtros_repa() {
        return $this->Otros_repa;
    }

    function getIdtran_repa() {
        return $this->Idtran_repa;
    }

    function setId_repa($Id_repa) {
        $this->Id_repa = $Id_repa;
    }

    function setLargo_repa($Largo_repa) {
        $this->Largo_repa = $Largo_repa;
    }

    function setAncho_repa($Ancho_repa) {
        $this->Ancho_repa = $Ancho_repa;
    }

    function setAltu_repa($Altu_repa) {
        $this->Altu_repa = $Altu_repa;
    }

    function setRefri_repa($Refri_repa) {
        $this->Refri_repa = $Refri_repa;
    }

    function setTipo_conductor($Tipo_conductor) {
        $this->Tipo_conductor = $Tipo_conductor;
    }

    function setBisel_repa($Bisel_repa) {
        $this->Bisel_repa = $Bisel_repa;
    }

    function setFibra_repa($Fibra_repa) {
        $this->Fibra_repa = $Fibra_repa;
    }

    function setCali_repa($Cali_repa) {
        $this->Cali_repa = $Cali_repa;
    }

    function setOtros_repa($Otros_repa) {
        $this->Otros_repa = $Otros_repa;
    }

    function setIdtran_repa($Idtran_repa) {
        $this->Idtran_repa = $Idtran_repa;
    }


    
}
