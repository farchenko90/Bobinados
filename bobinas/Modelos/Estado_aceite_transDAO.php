<?php


class Estado_aceite_transDAO {
    
    public function insertar($p,$idTrans){
        $conn = new conexion();
        $bob = -1;
        try {
            if($conn->conectar()){
                $str_sql = "Insert into estado_aceite_trans(fecha,pasada_arena,tiempo_filtro,temperatura_max,color,tiempo_reposo_ini,"
                        . "kv1,kv2,kv3,kv4,kv5,kv6,kv_total,tiempo_reposo1,tiempo_reposo2,tiempo_reposo3,tiempo_reposo4,tiempo_reposo5,"
                        . "tiempo_reposo6,tiempo_reposo_total,escala_chispometro,aceite_trans,observaciones,responsable,id_trans) values("
                        ."'".$p->fecha."',"
                        ."'".$p->pasada_arena."',"
                        ."'".$p->tiempo_filtro."',"
                        ."'".$p->temperatura_max."',"
                        ."'".$p->color."',"
                        ."'".$p->tiempo_reposo_ini."',"
                        ."'".$p->kv1."',"
                        ."'".$p->kv2."',"
                        ."'".$p->kv3."',"
                        ."'".$p->kv4."',"
                        ."'".$p->kv5."',"
                        ."'".$p->kv6."',"
                        ."'".$p->kv_total."',"
                        ."'".$p->tiempo_reposo1."',"
                        ."'".$p->tiempo_reposo2."',"
                        ."'".$p->tiempo_reposo3."',"
                        ."'".$p->tiempo_reposo4."',"
                        ."'".$p->tiempo_reposo5."',"
                        ."'".$p->tiempo_reposo6."',"
                        ."'".$p->tiempo_reposo_total."',"
                        ."'".$p->escala_chispometro."',"
                        ."'".$p->aceite_trans."',"
                        ."'".$p->observaciones."',"
                        ."'".$p->responsable."',"
                        ."".$idTrans.");";
                $sql  = $conn->getConn()->prepare($str_sql);
                $bob = $sql->execute();
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        $conn->desconectar();
        return $bob;
    }
    
    public function update($p,$id){
        $conn = new conexion();
        $bob = -1;
        try {
            if($conn->conectar()){
                $str_sql = "UPDATE estado_aceite_trans SET "
                        ."fecha = '".$p->fecha."',"
                        ."pasada_arena = '".$p->pasada_arena."',"
                        ."tiempo_filtro = '".$p->tiempo_filtro."',"
                        ."temperatura_max = '".$p->temperatura_max."',"
                        ."color = '".$p->color."',"
                        ."tiempo_reposo_ini = '".$p->tiempo_reposo_ini."',"
                        ."kv1 = '".$p->kv1."',"
                        ."kv2 = '".$p->kv2."',"
                        ."kv3 = '".$p->kv3."',"
                        ."kv4 = '".$p->kv4."',"
                        ."kv5 = '".$p->kv5."',"
                        ."kv6 = '".$p->kv6."',"
                        ."kv_total = '".$p->kv_total."',"
                        ."tiempo_reposo1 = '".$p->tiempo_reposo1."',"
                        ."tiempo_reposo2 = '".$p->tiempo_reposo2."',"
                        ."tiempo_reposo3 = '".$p->tiempo_reposo3."',"
                        ."tiempo_reposo4 = '".$p->tiempo_reposo4."',"
                        ."tiempo_reposo5 = '".$p->tiempo_reposo5."',"
                        ."tiempo_reposo6 = '".$p->tiempo_reposo6."',"
                        ."tiempo_reposo_total = '".$p->tiempo_reposo_total."',"
                        ."escala_chispometro = '".$p->escala_chispometro."',"
                        ."aceite_trans = '".$p->aceite_trans."',"
                        ."observaciones = '".$p->observaciones."',"
                        ."responsable = '".$p->responsable."' "
                        ."WHERE id = ".$id." ;";
                $sql  = $conn->getConn()->prepare($str_sql);
                $bob = $sql->execute();
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        $conn->desconectar();
        return $bob;
    }
    
    public function delete($id){
        $conn = new conexion();
        $bob = -1;
        try {
            if($conn->conectar()){
                $str_sql = "DELETE FROM estado_aceite_trans "
                        ."WHERE id = ".$id." ;";
                $sql  = $conn->getConn()->prepare($str_sql);
                $bob = $sql->execute();
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        $conn->desconectar();
        return $bob;
    }
    
    function lista($id){
        $conn = new conexion();
        $mot = null;
        try {
            if($conn->conectar()){
                $str_sql = "SELECT * FROM estado_aceite_trans "
                        . "WHERE id_trans = ".$id;
                $sql = $conn->getConn()->prepare($str_sql);
                $sql->execute();
                $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
                $mot = $resultado;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        $conn->desconectar();
        return $mot;
    }
    
    public function cambiarestado($id){
        $conn = new conexion();
        $est = -1; 
        try {
            if($conn->conectar()){
                $str_sql = "Update estado_aceite_trans set estado = 'Terminado' where id = ".$id;
                $sql = $conn->getConn()->prepare($str_sql);
                $est = $sql->execute();
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        $conn->desconectar();
        return $est;
    }
    
}
