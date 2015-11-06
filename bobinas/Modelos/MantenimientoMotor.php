<?php


class MantenimientoMotor {

    private $Id_mantenimiento;
    private $Num_serie_motor;
    private $Id_motor;
    private $Id_usuario;
    private $Amp;
    private $Voltios;
    private $Balineras;
    private $Sello_mecanico;
    private $Cap_arranque;
    private $Cap_marcha;
    private $otros;
    private $P_finales;
    private $Observaciones;
    
    function getId_motor() {
        return $this->Id_motor;
    }

    function setId_motor($Id_motor) {
        $this->Id_motor = $Id_motor;
    }
    
    function getId_mantenimiento() {
        return $this->Id_mantenimiento;
    }

    function getNum_serie_motor() {
        return $this->Num_serie_motor;
    }

    function getId_usuario() {
        return $this->Id_usuario;
    }

    function getAmp() {
        return $this->Amp;
    }

    function getVoltios() {
        return $this->Voltios;
    }

    function getBalineras() {
        return $this->Balineras;
    }

    function getSello_mecanico() {
        return $this->Sello_mecanico;
    }

    function getCap_arranque() {
        return $this->Cap_arranque;
    }

    function getCap_marcha() {
        return $this->Cap_marcha;
    }

    function getOtros() {
        return $this->otros;
    }

    function getP_finales() {
        return $this->P_finales;
    }

    function getObservaciones() {
        return $this->Observaciones;
    }

    function setId_mantenimiento($Id_mantenimiento) {
        $this->Id_mantenimiento = $Id_mantenimiento;
    }

    function setNum_serie_motor($Num_serie_motor) {
        $this->Num_serie_motor = $Num_serie_motor;
    }

    function setId_usuario($Id_usuario) {
        $this->Id_usuario = $Id_usuario;
    }

    function setAmp($Amp) {
        $this->Amp = $Amp;
    }

    function setVoltios($Voltios) {
        $this->Voltios = $Voltios;
    }

    function setBalineras($Balineras) {
        $this->Balineras = $Balineras;
    }

    function setSello_mecanico($Sello_mecanico) {
        $this->Sello_mecanico = $Sello_mecanico;
    }

    function setCap_arranque($Cap_arranque) {
        $this->Cap_arranque = $Cap_arranque;
    }

    function setCap_marcha($Cap_marcha) {
        $this->Cap_marcha = $Cap_marcha;
    }

    function setOtros($otros) {
        $this->otros = $otros;
    }

    function setP_finales($P_finales) {
        $this->P_finales = $P_finales;
    }

    function setObservaciones($Observaciones) {
        $this->Observaciones = $Observaciones;
    }


    
}
