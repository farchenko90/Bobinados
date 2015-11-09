<?php


class ChatUser {
    
    private $id;
    private $mensaje;
    private $idusu1;
    private $idusu2;
    private $nomusuario;
    private $fecha;
    private $hora;
    private $estado;
    private $archivo;
    
    function getId() {
        return $this->id;
    }

    function getMensaje() {
        return $this->mensaje;
    }

    function getIdusu1() {
        return $this->idusu1;
    }

    function getIdusu2() {
        return $this->idusu2;
    }

    function getNomusuario() {
        return $this->nomusuario;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getHora() {
        return $this->hora;
    }

    function getEstado() {
        return $this->estado;
    }

    function getArchivo() {
        return $this->archivo;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setMensaje($mensaje) {
        $this->mensaje = $mensaje;
    }

    function setIdusu1($idusu1) {
        $this->idusu1 = $idusu1;
    }

    function setIdusu2($idusu2) {
        $this->idusu2 = $idusu2;
    }

    function setNomusuario($nomusuario) {
        $this->nomusuario = $nomusuario;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setHora($hora) {
        $this->hora = $hora;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setArchivo($archivo) {
        $this->archivo = $archivo;
    }


    
}
