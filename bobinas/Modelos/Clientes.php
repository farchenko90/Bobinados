<?php

class Clientes {

    public $Id_cliente;
    private $Cedula;
    private $Nom_cliente;
    private $Direccion;
    private $Telefono;
    private $Fecha_ingre;
    private $Ciudad;
    private $Apellido;
    private $serial;
    private $Email;
    
    function getEmail() {
        return $this->Email;
    }

    function setEmail($Email) {
        $this->Email = $Email;
    }
        
    function getSerial() {
        return $this->serial;
    }

    function setSerial($serial) {
        $this->serial = $serial;
    }
    
    function getApellido() {
        return $this->Apellido;
    }

    function setApellido($Apellido) {
        $this->Apellido = $Apellido;
    }
    
    function getCedula() {
        return $this->Cedula;
    }

    function setCedula($Cedula) {
        $this->Cedula = $Cedula;
    }
 
    function getId_cliente() {
        return $this->Id_cliente;
    }

    function getNom_cliente() {
        return $this->Nom_cliente;
    }

    function getDireccion() {
        return $this->Direccion;
    }

    function getTelefono() {
        return $this->Telefono;
    }

    function getFecha_ingre() {
        return $this->Fecha_ingre;
    }

    function getCiudad() {
        return $this->Ciudad;
    }

    function setId_cliente($Id_cliente) {
        $this->Id_cliente = $Id_cliente;
    }

    function setNom_cliente($Nom_cliente) {
        $this->Nom_cliente = $Nom_cliente;
    }

    function setDireccion($Direccion) {
        $this->Direccion = $Direccion;
    }

    function setTelefono($Telefono) {
        $this->Telefono = $Telefono;
    }

    function setFecha_ingre($Fecha_ingre) {
        $this->Fecha_ingre = $Fecha_ingre;
    }

    function setCiudad($Ciudad) {
        $this->Ciudad = $Ciudad;
    }


    
}
