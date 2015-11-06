<?php


class Estado_transformador {
    
    private $tension_aplicada;
    private $ff11;
    private $ff12;
    private $ff13;
    private $ff14;
    private $ff15;
    private $ff21;
    private $ff22;
    private $ff23;
    private $ff24;
    private $ff25;
    private $ff31;
    private $ff32;
    private $ff33;
    private $ff34;
    private $ff35;
    private $fn1;
    private $fn2;
    private $fn3;
    private $fn4;
    private $fn5;
    private $corto_circuito_x;
    private $corto_circuito_y;
    private $corto_circuito_z;
    private $corto_circuito_n;
    private $seco_30_ab;
    private $seco_30_at;
    private $seco_30_bt;
    private $seco_60_ab;
    private $seco_60_at;
    private $seco_60_bt;
    private $aceite_30_ab;
    private $aceite_30_at;
    private $aceite_30_bt;
    private $aceite_60_ab;
    private $aceite_60_at;
    private $aceite_60_bt;
    private $encube;
    private $tension_aplicada2;
    private $amperaje;
    private $voltaje_de_salida;
    private $pintura;
    private $observaciones;
    private $responsable;
    private $idTrans;
    
    function getTension_aplicada() {
        return $this->tension_aplicada;
    }

    function getFf11() {
        return $this->ff11;
    }

    function getFf12() {
        return $this->ff12;
    }

    function getFf13() {
        return $this->ff13;
    }

    function getFf14() {
        return $this->ff14;
    }

    function getFf15() {
        return $this->ff15;
    }

    function getFf21() {
        return $this->ff21;
    }

    function getFf22() {
        return $this->ff22;
    }

    function getFf23() {
        return $this->ff23;
    }

    function getFf24() {
        return $this->ff24;
    }

    function getFf25() {
        return $this->ff25;
    }

    function getFf31() {
        return $this->ff31;
    }

    function getFf32() {
        return $this->ff32;
    }

    function getFf33() {
        return $this->ff33;
    }

    function getFf34() {
        return $this->ff34;
    }

    function getFf35() {
        return $this->ff35;
    }

    function getFn1() {
        return $this->fn1;
    }

    function getFn2() {
        return $this->fn2;
    }

    function getFn3() {
        return $this->fn3;
    }

    function getFn4() {
        return $this->fn4;
    }

    function getFn5() {
        return $this->fn5;
    }

    function getCorto_circuito_x() {
        return $this->corto_circuito_x;
    }

    function getCorto_circuito_y() {
        return $this->corto_circuito_y;
    }

    function getCorto_circuito_z() {
        return $this->corto_circuito_z;
    }

    function getCorto_circuito_n() {
        return $this->corto_circuito_n;
    }

    function getSeco_30_ab() {
        return $this->seco_30_ab;
    }

    function getSeco_30_at() {
        return $this->seco_30_at;
    }

    function getSeco_30_bt() {
        return $this->seco_30_bt;
    }

    function getSeco_60_ab() {
        return $this->seco_60_ab;
    }

    function getSeco_60_at() {
        return $this->seco_60_at;
    }

    function getSeco_60_bt() {
        return $this->seco_60_bt;
    }

    function getAceite_30_ab() {
        return $this->aceite_30_ab;
    }

    function getAceite_30_at() {
        return $this->aceite_30_at;
    }

    function getAceite_30_bt() {
        return $this->aceite_30_bt;
    }

    function getAceite_60_ab() {
        return $this->aceite_60_ab;
    }

    function getAceite_60_at() {
        return $this->aceite_60_at;
    }

    function getAceite_60_bt() {
        return $this->aceite_60_bt;
    }

    function getEncube() {
        return $this->encube;
    }

    function getTension_aplicada2() {
        return $this->tension_aplicada2;
    }

    function getAmperaje() {
        return $this->amperaje;
    }

    function getVoltaje_de_salida() {
        return $this->voltaje_de_salida;
    }

    function getPintura() {
        return $this->pintura;
    }

    function getObservaciones() {
        return $this->observaciones;
    }

    function getResponsable() {
        return $this->responsable;
    }

    function getIdTrans() {
        return $this->idTrans;
    }

    function setTension_aplicada($tension_aplicada) {
        $this->tension_aplicada = $tension_aplicada;
    }

    function setFf11($ff11) {
        $this->ff11 = $ff11;
    }

    function setFf12($ff12) {
        $this->ff12 = $ff12;
    }

    function setFf13($ff13) {
        $this->ff13 = $ff13;
    }

    function setFf14($ff14) {
        $this->ff14 = $ff14;
    }

    function setFf15($ff15) {
        $this->ff15 = $ff15;
    }

    function setFf21($ff21) {
        $this->ff21 = $ff21;
    }

    function setFf22($ff22) {
        $this->ff22 = $ff22;
    }

    function setFf23($ff23) {
        $this->ff23 = $ff23;
    }

    function setFf24($ff24) {
        $this->ff24 = $ff24;
    }

    function setFf25($ff25) {
        $this->ff25 = $ff25;
    }

    function setFf31($ff31) {
        $this->ff31 = $ff31;
    }

    function setFf32($ff32) {
        $this->ff32 = $ff32;
    }

    function setFf33($ff33) {
        $this->ff33 = $ff33;
    }

    function setFf34($ff34) {
        $this->ff34 = $ff34;
    }

    function setFf35($ff35) {
        $this->ff35 = $ff35;
    }

    function setFn1($fn1) {
        $this->fn1 = $fn1;
    }

    function setFn2($fn2) {
        $this->fn2 = $fn2;
    }

    function setFn3($fn3) {
        $this->fn3 = $fn3;
    }

    function setFn4($fn4) {
        $this->fn4 = $fn4;
    }

    function setFn5($fn5) {
        $this->fn5 = $fn5;
    }

    function setCorto_circuito_x($corto_circuito_x) {
        $this->corto_circuito_x = $corto_circuito_x;
    }

    function setCorto_circuito_y($corto_circuito_y) {
        $this->corto_circuito_y = $corto_circuito_y;
    }

    function setCorto_circuito_z($corto_circuito_z) {
        $this->corto_circuito_z = $corto_circuito_z;
    }

    function setCorto_circuito_n($corto_circuito_n) {
        $this->corto_circuito_n = $corto_circuito_n;
    }

    function setSeco_30_ab($seco_30_ab) {
        $this->seco_30_ab = $seco_30_ab;
    }

    function setSeco_30_at($seco_30_at) {
        $this->seco_30_at = $seco_30_at;
    }

    function setSeco_30_bt($seco_30_bt) {
        $this->seco_30_bt = $seco_30_bt;
    }

    function setSeco_60_ab($seco_60_ab) {
        $this->seco_60_ab = $seco_60_ab;
    }

    function setSeco_60_at($seco_60_at) {
        $this->seco_60_at = $seco_60_at;
    }

    function setSeco_60_bt($seco_60_bt) {
        $this->seco_60_bt = $seco_60_bt;
    }

    function setAceite_30_ab($aceite_30_ab) {
        $this->aceite_30_ab = $aceite_30_ab;
    }

    function setAceite_30_at($aceite_30_at) {
        $this->aceite_30_at = $aceite_30_at;
    }

    function setAceite_30_bt($aceite_30_bt) {
        $this->aceite_30_bt = $aceite_30_bt;
    }

    function setAceite_60_ab($aceite_60_ab) {
        $this->aceite_60_ab = $aceite_60_ab;
    }

    function setAceite_60_at($aceite_60_at) {
        $this->aceite_60_at = $aceite_60_at;
    }

    function setAceite_60_bt($aceite_60_bt) {
        $this->aceite_60_bt = $aceite_60_bt;
    }

    function setEncube($encube) {
        $this->encube = $encube;
    }

    function setTension_aplicada2($tension_aplicada2) {
        $this->tension_aplicada2 = $tension_aplicada2;
    }

    function setAmperaje($amperaje) {
        $this->amperaje = $amperaje;
    }

    function setVoltaje_de_salida($voltaje_de_salida) {
        $this->voltaje_de_salida = $voltaje_de_salida;
    }

    function setPintura($pintura) {
        $this->pintura = $pintura;
    }

    function setObservaciones($observaciones) {
        $this->observaciones = $observaciones;
    }

    function setResponsable($responsable) {
        $this->responsable = $responsable;
    }

    function setIdTrans($idTrans) {
        $this->idTrans = $idTrans;
    }


    
}
