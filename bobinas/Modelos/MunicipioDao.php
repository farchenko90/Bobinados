<?php


class MunicipioDao {
    
    public function listamunicipios($id){
        $conn = new conexion();
        $rep = null;
        try {
            if($conn->conectar()){
                $str_sql = "Select municipio.* from municipio "
                        . "where departamento_iddepartamento = $id";
                        
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
    
    public function Allmunicipios(){
        $conn = new conexion();
        $rep = null;
        try {
            if($conn->conectar()){
                $str_sql = "Select municipio.*,departamento.nombre as departamento "
                        . "from municipio "
                        . "inner join departamento on "
                        . "departamento.iddepartamento = municipio.departamento_iddepartamento";
                        
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
    
    public function registrarmunicipio(Municipio $muni){
        $conn = new conexion();
        $mot = -1;
        try {
            if($conn->conectar()){
                $str_sql = "Insert into municipio(nombreMunicipio,departamento_iddepartamento) values("
                        ."'".$muni->getNombreMunicipio()."',"
                        ."".$muni->getDepartamento_iddepartamento().");";
                $sql  = $conn->getConn()->prepare($str_sql);
                $mot = $sql->execute();
            }
        }  catch (Exception $exc){
            echo $exc->getTraceAsString();
        }
        $conn->desconectar();
        return $mot;
    }
    
}
