<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MarcatransDao
 *
 * @author fabio
 */
class MarcatransDao {
    
    public function registrarmarcatrans(Marcatrans $marca){
        $conn = new conexion();
        $mot = -1;
        try {
            if($conn->conectar()){
                $str_sql = "Insert into marcatrasnformador(nombre) values("
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
    
    public function listamarcastrans(){
        $conn = new conexion();
        $rep = null;
        try {
            if($conn->conectar()){
                $str_sql = "Select marcatrasnformador.* from marcatrasnformador ";
                        
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
