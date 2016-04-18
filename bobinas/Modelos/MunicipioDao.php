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
}
