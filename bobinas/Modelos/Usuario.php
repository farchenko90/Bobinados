<?php

class Usuario {
    
    private $Id_usu;
    private $Cedula;
    private $Nom_usu;
    private $Usuario;
    private $Pass;
    private $Foto;
    private $Id_tp_usu;
    private $Email;
    private $Estado;
    private $Telefono;
    private $serial;
    private $Idcliente;
    private $Tipo;
    
    function getTipo() {
        return $this->Tipo;
    }

    function setTipo($Tipo) {
        $this->Tipo = $Tipo;
    }
            
    function getIdcliente() {
        return $this->Idcliente;
    }

    function setIdcliente($Idcliente) {
        $this->Idcliente = $Idcliente;
    }
                
    function getSerial() {
        return $this->serial;
    }

    function setSerial($serial) {
        $this->serial = $serial;
    }
                
    function getCedula() {
        return $this->Cedula;
    }

    function setCedula($Cedula) {
        $this->Cedula = $Cedula;
    }

        
    
    function getEstado() {
        return $this->Estado;
    }

    function setEstado($Estado) {
        $this->Estado = $Estado;
    }

        
    function getTelefono() {
        return $this->Telefono;
    }

    function setTelefono($Telefono) {
        $this->Telefono = $Telefono;
    }    
            
    function getEmail() {
        return $this->Email;
    }

    function setEmail($Email) {
        $this->Email = $Email;
    }
        
    function getId_usu() {
        return $this->Id_usu;
    }

    function getNom_usu() {
        return $this->Nom_usu;
    }

    function getUsuario() {
        return $this->Usuario;
    }

    function getPass() {
        return $this->Pass;
    }

    function getFoto() {
        return $this->Foto;
    }

    function getId_tp_usu() {
        return $this->Id_tp_usu;
    }

    function setId_usu($Id_usu) {
        $this->Id_usu = $Id_usu;
    }

    function setNom_usu($Nom_usu) {
        $this->Nom_usu = $Nom_usu;
    }

    function setUsuario($Usuario) {
        $this->Usuario = $Usuario;
    }

    function setPass($Pass) {
        $this->Pass = $Pass;
    }

    function setFoto($Foto) {
        $this->Foto = $Foto;
    }

    function setId_tp_usu($Id_tp_usu) {
        $this->Id_tp_usu = $Id_tp_usu;
    }

    public function mapear($user){
        $this->Nom_usu = $user['nom_usu'];
        $this->Usuario = $user['usuario'];
        $this->Email   = $user['email'];
        $this->Pass    = $user['pass'];
        $this->Foto    = $user['foto'];
    }
    
    public function mapear1($user){
        $this->Nom_usu  = $user['nom_usu'];
        $this->Usuario  = $user['usuario'];
        $this->Email    = $user['email'];
        $this->Telefono = $user['telefono'];
        $this->Foto     = $user['foto'];
    }
    
}
