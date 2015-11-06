<?php

class Lista_verificacion {
    
    private $Id_lista;
    private $Lista_lista;
    private $Cual_lista;
    private $Observacion_lista;
    private $Id_tra_lista;
    private $Contador;
    
    function getContador() {
        return $this->Contador;
    }

    function setContador($Contador) {
        $this->Contador = $Contador;
    }

    function getId_lista() {
        return $this->Id_lista;
    }

    function getLista_lista() {
        return $this->Lista_lista;
    }

    function getCual_lista() {
        return $this->Cual_lista;
    }

    function getObservacion_lista() {
        return $this->Observacion_lista;
    }

    function getId_tra_lista() {
        return $this->Id_tra_lista;
    }

    function setId_lista($Id_lista) {
        $this->Id_lista = $Id_lista;
    }

    function setLista_lista($Lista_lista) {
        $this->Lista_lista = $Lista_lista;
    }

    function setCual_lista($Cual_lista) {
        $this->Cual_lista = $Cual_lista;
    }

    function setObservacion_lista($Observacion_lista) {
        $this->Observacion_lista = $Observacion_lista;
    }

    function setId_tra_lista($Id_tra_lista) {
        $this->Id_tra_lista = $Id_tra_lista;
    }


    
}
