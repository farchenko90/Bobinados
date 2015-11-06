<?php


class TrabajadoresAsignadosDao {
    
    public function registrarasignados(TrabajdoresAsignados $tra){
        $conn = new conexion();
        $user = -1;
        try {
            if($conn->conectar()){
                $str_sql = "Insert into trabajadoresasignados(idjefe,idempleado) values("
                        ."".$tra->getIdjefe().","
                        ."".$tra->getIdempleado().");";
                $sql  = $conn->getConn()->prepare($str_sql);
                $user = $sql->execute();
               
            }
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
        $conn->desconectar();
        return $user;
    }
    
    public function EliminarAsignado($id){
        $conn = new Conexion();
        $res = -1;
        try{
            if($conn->conectar()){
                $sql_str = "DELETE FROM trabajadoresasignados WHERE idjefe = ".$id;
                $sql = $conn->getConn()->prepare($sql_str);
                
                $res = $sql->execute();
            }
        }catch(Exception $ex){
            $this->msg_exception = $ex->getMessage();
        }
        $conn->desconectar();
        return $res;
    }
    
    public function mostrarempleadoasignados($id) {
        $conn = new Conexion();
        $user = null;
        try {
            if($conn->conectar()){
                $str_sql = "Select trabajadoresasignados.idempleado from trabajadoresasignados "
                        . "where trabajadoresasignados.idjefe = $id ";
                        
                $sql = $conn->getConn()->prepare($str_sql);
                $sql->execute();
                $resultado = $sql->fetchAll();
                for ($i=0;$i<count($resultado);$i++){
                    $consulta = "Select usuarios.nom_usu,usuarios.usuario,usuarios.cedula,usuarios.foto,usuarios.telefono, "
                            . "usuarios.email from usuarios where usuarios.id_usu = ".$resultado[$i][0];
                    $sql1 = $conn->getConn()->prepare($consulta);
                    $sql1->execute();
                    $resultado1 = $sql1->fetchAll();
                    foreach ($resultado1 as $row){
                        $user[] = array(
                            "Nomusu"    => $row['nom_usu'],
                            "usuarios"  => $row['usuario'],
                            "Foto"      => $row['foto'],
                            "Cedula"    => $row['cedula'],
                            "Telefono"  => $row['telefono'],
                            "Email"     => $row['email']
                        );
                    }
                    
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        $conn->desconectar();
        return $user;
    }
    
}
