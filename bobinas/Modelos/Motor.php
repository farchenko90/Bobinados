<?php

class Motor {

    private $Num_serie_motor;
    private $Id_motores;
    private $Marca;
    private $Hp;
    private $Kw;
    private $Rpm;
    private $N_fases;
    private $Cotizado;
    private $Autorizado;
    private $Id_usu;
    private $Id_cliente;
    private $Accion;
    private $Fe_term;
    private $Fe_acord;
    private $revicion;
    private $Estado;
    private $Estado2;
    private $Foto;
    private $Ns;
    
    function getNs() {
        return $this->Ns;
    }

    function setNs($Ns) {
        $this->Ns = $Ns;
    }

        
    function getEstado2() {
        return $this->Estado2;
    }

    function setEstado2($Estado2) {
        $this->Estado2 = $Estado2;
    }
    
    function getId_motores() {
        return $this->Id_motores;
    }

    function setId_motores($Id_motores) {
        $this->Id_motores = $Id_motores;
    }    
    
    function getFoto() {
        return $this->Foto;
    }

    function setFoto($Foto) {
        $this->Foto = $Foto;
    }
            
    function getEstado() {
        return $this->Estado;
    }

    function setEstado($Estado) {
        $this->Estado = $Estado;
    }

                
    function getRevicion() {
        return $this->revicion;
    }

    function setRevicion($revicion) {
        $this->revicion = $revicion;
    }

                
    function getNum_serie_motor() {
        return $this->Num_serie_motor;
    }

    function getMarca() {
        return $this->Marca;
    }

    function getHp() {
        return $this->Hp;
    }

    function getKw() {
        return $this->Kw;
    }

    function getRpm() {
        return $this->Rpm;
    }

    function getN_fases() {
        return $this->N_fases;
    }

    function getCotizado() {
        return $this->Cotizado;
    }

    function getAutorizado() {
        return $this->Autorizado;
    }

    function getId_usu() {
        return $this->Id_usu;
    }

    function getId_cliente() {
        return $this->Id_cliente;
    }

    function getAccion() {
        return $this->Accion;
    }

    function getFe_term() {
        return $this->Fe_term;
    }

    function getFe_acord() {
        return $this->Fe_acord;
    }

    function setNum_serie_motor($Num_serie_motor) {
        $this->Num_serie_motor = $Num_serie_motor;
    }

    function setMarca($Marca) {
        $this->Marca = $Marca;
    }

    function setHp($Hp) {
        $this->Hp = $Hp;
    }

    function setKw($Kw) {
        $this->Kw = $Kw;
    }

    function setRpm($Rpm) {
        $this->Rpm = $Rpm;
    }

    function setN_fases($N_fases) {
        $this->N_fases = $N_fases;
    }

    function setCotizado($Cotizado) {
        $this->Cotizado = $Cotizado;
    }

    function setAutorizado($Autorizado) {
        $this->Autorizado = $Autorizado;
    }

    function setId_usu($Id_usu) {
        $this->Id_usu = $Id_usu;
    }

    function setId_cliente($Id_cliente) {
        $this->Id_cliente = $Id_cliente;
    }

    function setAccion($Accion) {
        $this->Accion = $Accion;
    }

    function setFe_term($Fe_term) {
        $this->Fe_term = $Fe_term;
    }

    function setFe_acord($Fe_acord) {
        $this->Fe_acord = $Fe_acord;
    }


    
}
