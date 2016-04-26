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
    
    public function getbyidtrans($id){
        $conn = new conexion();
        $rep = null;
        try {
            if($conn->conectar()){
                $str_sql = "Select marcatrasnformador.* from marcatrasnformador where id = $id";
                $sql = $conn->getConn()->prepare($str_sql);
                $sql->execute();
                $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
                $rep = $resultado;
            }
        }catch (Exception $exc){
            echo $exc->getTraceAsString();
        }
        $conn->desconectar();
        return $rep;
    }
    
    public function updatetrans($id,Marcatrans $mar){
        $conn = new conexion();
        $cli = -1;
        try {
            if($conn->conectar()){
                $str_sql = "Update marcatrasnformador set nombre = '".$mar->getNombre()."' "
                        . "where id = $id";
                $sql  = $conn->getConn()->prepare($str_sql);
                $cli = $sql->execute();
            }
        }catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        $conn->desconectar();
        return $cli;
    }
    
    public function deletemarca($id){
        $conn = new Conexion();
        $res = -1;
        try{
            if($conn->conectar()){
                $sql_str = "DELETE FROM marcatrasnformador WHERE id = ".$id."";
                $sql = $conn->getConn()->prepare($sql_str);
                
                $res = $sql->execute();
            }
        }catch(Exception $ex){
            $this->msg_exception = $ex->getMessage();
        }
        $conn->desconectar();
        return $res;
    }
    
}
