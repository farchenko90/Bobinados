<?php


class ChatDao {
    
    public function RegistrarChat(Chat $c){
        $conn = new conexion();
        $chat = -1;
        try {
            if($conn->conectar()){
                $str_sql = "Insert into bobinados.chat(mensaje,idusu,idcli,nomusuario,fecha,hora,archivo) "
                        . "values("
                        ."'".$c->getMensaje()."',"
                        ."".$c->getIdusu().","
                        ."".$c->getIdcli().","
                        ."'".$c->getNomusuario()."',"
                        ."'".$c->getFecha()."',"
                        ."'".$c->getHora()."',"
                        ."'".$c->getArchivo()."');";
                $sql  = $conn->getConn()->prepare($str_sql);
                $chat = $sql->execute();
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        $conn->desconectar();
        return $chat;
    }
    
    public function verMensaje($idusu,$idcli){
        $conn = new conexion();
        $chat = null;
        try {
            if($conn->conectar()){
                $str_sql = "SELECT chat.mensaje,chat.nomusuario,chat.fecha,chat.hora,chat.estado,chat.archivo "
                        . "from chat where chat.idusu = $idusu and "
                        . "chat.idcli = $idcli";
                $sql = $conn->getConn()->prepare($str_sql);
                $sql->execute();
                $resultado = $sql->fetchAll();
                foreach ($resultado as $row){
                    $chat[] = array(
                        "mensaje"   => $row['mensaje'],
                        "usuario"   => $row['nomusuario'],
                        "fecha"     => $row['fecha'],
                        "hora"      => $row['hora'],
                        "estado"    => $row['estado'],
                        "archivo"   => $row['archivo']
                    );
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        $conn->desconectar();
        return $chat;
    }
    
    public function verMensajeCliente($idcli,$idusu){
        $conn = new conexion();
        $chat = null;
        try {
            if($conn->conectar()){
                $str_sql = "SELECT chat.mensaje from chat where chat.idcli = $idcli and "
                        . "chat.idusu = $idusu";
                $sql = $conn->getConn()->prepare($str_sql);
                $sql->execute();
                $resultado = $sql->fetchAll();
                foreach ($resultado as $row){
                    $chat[] = array(
                        "mensaje"   => $row['mensaje']    
                    );
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        $conn->desconectar();
        return $chat;
    }
    
    public function bandejaentrada($idusu,$nom){
        $conn = new conexion();
        $chat = null;
        $fecha = date('Y-m-d');
        try {
            if($conn->conectar()){
                $str_sql = "(SELECT chat.mensaje,chat.nomusuario,chat.fecha,chat.hora,chat.estado,chat.idcli as idtabla,"
                        . "chat.archivo as tipo from chat "
                        . "where "
                        . "chat.idusu = $idusu and chat.fecha <= '$fecha' and chat.nomusuario <> '$nom' and "
                        . "chat.estado = 'Enviado')"
                        . "union"
                        . "(SELECT chatusuarios.mensaje,chatusuarios.nomusuario,chatusuarios.fecha,chatusuarios.hora,"
                        . "chatusuarios.estado,chatusuarios.idusu1 as idtabla,chatusuarios.tipo as tipo from chatusuarios "
                        . "where "
                        . "chatusuarios.idusu2 = $idusu and chatusuarios.fecha <= '$fecha' and "
                        . "chatusuarios.nomusuario <> '$nom' and chatusuarios.estado = 'Enviado')";
                $sql = $conn->getConn()->prepare($str_sql);
                $sql->execute();
                $resultado = $sql->fetchAll();
                foreach ($resultado as $row){
                    $chat[] = array(
                        "mensaje"   => $row['mensaje'],
                        "usuario"   => $row['nomusuario'],
                        "fecha"     => $row['fecha'],
                        "hora"      => $row['hora'],
                        "estado"    => $row['estado'],
                        "IdCli"     => $row['idtabla'],
                        "Tipo"      => $row['tipo']
                    );
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        $conn->desconectar();
        return $chat;
    }
    
    public function bandejaentradacliente($idcli,$nom){
        $conn = new conexion();
        $chat = null;
        $fecha = date('Y-m-d');
        try {
            if($conn->conectar()){
                $str_sql = "SELECT chat.mensaje,chat.nomusuario,chat.fecha,chat.hora,chat.estado,chat.idusu from chat where "
                        . "chat.idcli = $idcli and chat.fecha <= '$fecha' and chat.nomusuario <> '$nom' and chat.estado = 'Enviado'";
                $sql = $conn->getConn()->prepare($str_sql);
                $sql->execute();
                $resultado = $sql->fetchAll();
                foreach ($resultado as $row){
                    $chat[] = array(
                        "mensaje"   => $row['mensaje'],
                        "usuario"   => $row['nomusuario'],
                        "fecha"     => $row['fecha'],
                        "hora"      => $row['hora'],
                        "estado"    => $row['estado'],
                        "Idusu"     => $row['idusu']
                    );
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        $conn->desconectar();
        return $chat;
    }
    
    public function estadoVisto(Chat $c,$idusu,$idcli){
        ///SELECT COUNT(chat.id) from chat where chat.idusu = 17 and chat.estado = 'Enviado'
        $conn = new conexion();
        $chat = -1;
        $id = null;
        try {
            if($conn->conectar()){
                $cons = "Select chat.id from chat "
                        . "inner join usuarios on usuarios.id_usu = chat.idusu where "
                        . "chat.idusu = $idusu and chat.idcli = $idcli and chat.nomusuario = '".$c->getNomusuario()."'";
                $sql = $conn->getConn()->prepare($cons);
                $sql->execute();
                $resultado = $sql->fetchAll();
                for($i=0; $i<count($resultado); $i++){
                    $str_sql = "Update chat set estado = '".$c->getEstado()."' where chat.id = ".$resultado[$i][0];
                    $sql = $conn->getConn()->prepare($str_sql);
                    $chat = $sql->execute();  
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        $conn->desconectar();
        return $chat;
    }
    
    public function borrarchatusuario($id,$user){
        $conn = new Conexion();
        $res = -1;
        try{
            if($conn->conectar()){
                $sql_str = "DELETE FROM chat WHERE idusu = ".$id." and nomusuario = '$user' ";
                $sql = $conn->getConn()->prepare($sql_str);
                
                $res = $sql->execute();
            }
        }catch(Exception $ex){
            $this->msg_exception = $ex->getMessage();
        }
        $conn->desconectar();
        return $res;
    }

    
    public function borrarchatcliente($id,$user){
        $conn = new Conexion();
        $res = -1;
        try{
            if($conn->conectar()){
                $sql_str = "DELETE FROM chat WHERE idcli = ".$id." and nomusuario = '$user' ";
                $sql = $conn->getConn()->prepare($sql_str);
                
                $res = $sql->execute();
            }
        }catch(Exception $ex){
            $this->msg_exception = $ex->getMessage();
        }
        $conn->desconectar();
        return $res;
    }

    /*public function cantidadmensajes($idusu){
        $conn = new conexion();
        $chat = null;
        try {
            if($conn->conectar()){
                $str_sql = "SELECT COUNT(chat.id) cont from chat where chat.idusu = $idusu and chat.estado = 'Enviado'";
                $sql = $conn->getConn()->prepare($str_sql);
                $sql->execute();
                $resultado = $sql->fetchAll();
                foreach ($resultado as $row){
                    $chat = array(
                        "contador"   => $row['cont']    
                    );
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        $conn->desconectar();
        return $chat;
    }*/
    
}
