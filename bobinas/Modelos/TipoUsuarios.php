<?php

class TipoUsuarios {
    
    private $Id_tp;
    private $Nom_tp;
    
    function getId_tp() {
        return $this->Id_tp;
    }

    function getNom_tp() {
        return $this->Nom_tp;
    }

    function setId_tp($Id_tp) {
        $this->Id_tp = $Id_tp;
    }

    function setNom_tp($Nom_tp) {
        $this->Nom_tp = $Nom_tp;
    }

    public function mapear($tipo){
        $this->Id_tp = $tipo['id_tipo'];
        $this->Nom_tp = $tipo['nom_tp'];
    }
    
}
