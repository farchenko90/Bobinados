<?php


class Chat {
    
    private $id;
    private $mensaje;
    private $idusu;
    private $idcli;
    private $nomusuario;
    private $fecha;
    private $hora;
    private $estado;
    private $archivo;
    
    function getArchivo() {
        return $this->archivo;
    }

    function setArchivo($archivo) {
        $this->archivo = $archivo;
    }

    function getEstado() {
        return $this->estado;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }
    
    function getFecha() {
        return $this->fecha;
    }

    function getHora() {
        return $this->hora;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setHora($hora) {
        $this->hora = $hora;
    }
    
    function getNomusuario() {
        return $this->nomusuario;
    }

    function setNomusuario($nomusuario) {
        $this->nomusuario = $nomusuario;
    }
                
    function getIdcli() {
        return $this->idcli;
    }

    function setIdcli($idcli) {
        $this->idcli = $idcli;
    }

    function getId() {
        return $this->id;
    }

    function getMensaje() {
        return $this->mensaje;
    }

    function getIdusu() {
        return $this->idusu;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setMensaje($mensaje) {
        $this->mensaje = $mensaje;
    }

    function setIdusu($idusu) {
        $this->idusu = $idusu;
    }


    
}
