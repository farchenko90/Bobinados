<?php


class ChatUserDao {

    public function RegistrarChatuser(ChatUser $c){
        $conn = new conexion();
        $chat = -1;
        try {
            if($conn->conectar()){
                $str_sql = "Insert into bobinados.chatusuarios(mensaje,idusu1,idusu2,nomusuario,fecha,hora,archivo) "
                        . "values("
                        ."'".$c->getMensaje()."',"
                        ."".$c->getIdusu1().","
                        ."".$c->getIdusu2().","
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
    
    public function verMensajeusuarios($idusu1,$idusu2){
        $conn = new conexion();
        $chat = null;
        try {
            if($conn->conectar()){
                $str_sql = "(SELECT chatusuarios.mensaje,chatusuarios.nomusuario,chatusuarios.fecha,chatusuarios.hora,"
                        . "chatusuarios.estado,chatusuarios.archivo,chatusuarios.id "
                        . "from chatusuarios where chatusuarios.idusu1 = $idusu1 and "
                        . "chatusuarios.idusu2 = $idusu2  )"
                        . "union"
                        . "(SELECT chatusuarios.mensaje,chatusuarios.nomusuario,chatusuarios.fecha,chatusuarios.hora,"
                        . "chatusuarios.estado,chatusuarios.archivo,chatusuarios.id "
                        . "from chatusuarios where chatusuarios.idusu2 = $idusu1 and "
                        . "chatusuarios.idusu1 = $idusu2  ) order by id ASC";
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
                        "archivo"   => $row['archivo'],
                        "id"        => $row['id']
                    );
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        $conn->desconectar();
        return $chat;
    }
    
    public function estadoVisto(ChatUser $c,$idusu1,$idusu2){
        ///SELECT COUNT(chat.id) from chat where chat.idusu = 17 and chat.estado = 'Enviado'
        $conn = new conexion();
        $chat = -1;
        try {
            if($conn->conectar()){
                $cons = "Select chatusuarios.id from chatusuarios "
                        . "inner join usuarios on usuarios.id_usu = chatusuarios.idusu1 where "
                        . "chatusuarios.idusu1 = $idusu1 and chatusuarios.idusu2 = $idusu2 and "
                        . "chatusuarios.nomusuario = '".$c->getNomusuario()."'";
                $sql = $conn->getConn()->prepare($cons);
                $sql->execute();
                $resultado = $sql->fetchAll();
                for($i=0; $i<count($resultado); $i++){
                    $str_sql = "Update chatusuarios set estado = '".$c->getEstado()."' where chatusuarios.id = ".$resultado[$i][0];
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
                $sql_str = "DELETE FROM chatusuarios WHERE idusu1 = ".$id." and nomusuario = '$user' ";
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
