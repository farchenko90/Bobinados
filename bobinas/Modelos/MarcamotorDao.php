<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MarcamotorDao
 *
 * @author fabio
 */
class MarcamotorDao {
    
    public function registrar(Marcamotor $marca){
        $conn = new conexion();
        $mot = -1;
        try {
            if($conn->conectar()){
                $str_sql = "Insert into marcamotor(nombre) values("
                        ."'".$marca->getNombre()."');";
                $sql  = $conn->getConn()->prepare($str_sql);
                $mot = $sql->execute();
            }
        }  catch (Exception $exc){
            echo $exc->getTraceAsString();
        }
        $conn->desconectar();
        return $mot;
    }
    
    public function listamarcas(){
        $conn = new conexion();
        $rep = null;
        try {
            if($conn->conectar()){
                $str_sql = "Select marcamotor.* from marcamotor ";
                        
                $sql = $conn->getConn()->prepare($str_sql);
                $sql->execute();
                $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
                $rep = $resultado;
                
            }
        }  catch (Exception $exc){
            echo $exc->getTraceAsString();
        }
        $conn->desconectar();
        return $rep;
    }
    
}
