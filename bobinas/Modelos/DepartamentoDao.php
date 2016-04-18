<?php


class DepartamentoDao {
    
    public function listadepartamentos(){
        $conn = new conexion();
        $dep = null;
        try {
            if($conn->conectar()){
                $str_sql = "Select departamento.* from departamento ";
                        
                $sql = $conn->getConn()->prepare($str_sql);
                $sql->execute();
                $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
                $dep = $resultado;
                
            }
        }  catch (Exception $exc){
            echo $exc->getTraceAsString();
        }
        $conn->desconectar();
        return $dep;
    }
}
