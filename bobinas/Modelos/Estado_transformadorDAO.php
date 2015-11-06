<?php

class Estado_transformadorDAO {
    
    
    public function insertar($p,$idTrans){
        $conn = new conexion();
        $bob = -1;
        try {
            if($conn->conectar()){
                $str_sql = "Insert into estado_transformador("
                        . "tension_aplicada,ff11,ff12,ff13,ff14,ff15,ff21,ff22,ff23,ff24,ff25,ff31,ff32,ff33,"
                        . "ff34,ff35,fn1,fn2,fn3,fn4,fn5,corto_circuito_x,corto_circuito_y,corto_circuito_z,"
                        . "corto_circuito_n,seco_30_ab,seco_30_at,seco_30_bt,seco_60_ab,seco_60_at,seco_60_bt,"
                        . "aceite_30_ab,aceite_30_at,aceite_30_bt,aceite_60_ab,aceite_60_at,aceite_60_bt,"
                        . "encube,tension_aplicada2,amperaje,voltaje_de_salida,pintura,observaciones,estado,responsable,id_trans"
                        . ") values("
                        ."'".$p->tension_aplicada."',"
                        ."'".$p->ff11."',"
                        ."'".$p->ff12."',"
                        ."'".$p->ff13."',"
                        ."'".$p->ff14."',"
                        ."'".$p->ff15."',"
                        ."'".$p->ff21."',"
                        ."'".$p->ff22."',"
                        ."'".$p->ff23."',"
                        ."'".$p->ff24."',"
                        ."'".$p->ff25."',"
                        ."'".$p->ff31."',"
                        ."'".$p->ff32."',"
                        ."'".$p->ff33."',"
                        ."'".$p->ff34."',"
                        ."'".$p->ff35."',"
                        ."'".$p->fn1."',"
                        ."'".$p->fn2."',"
                        ."'".$p->fn3."',"
                        ."'".$p->fn4."',"
                        ."'".$p->fn5."',"
                        ."'".$p->corto_circuito_x."',"
                        ."'".$p->corto_circuito_y."',"
                        ."'".$p->corto_circuito_z."',"
                        ."'".$p->corto_circuito_n."',"
                        ."'".$p->seco_30_ab."',"
                        ."'".$p->seco_30_at."',"
                        ."'".$p->seco_30_bt."',"
                        ."'".$p->seco_60_ab."',"
                        ."'".$p->seco_60_at."',"
                        ."'".$p->seco_60_bt."',"
                        ."'".$p->aceite_30_ab."',"
                        ."'".$p->aceite_30_at."',"
                        ."'".$p->aceite_30_bt."',"
                        ."'".$p->aceite_60_ab."',"
                        ."'".$p->aceite_60_at."',"
                        ."'".$p->aceite_60_bt."',"
                        ."'".$p->encube."',"
                        ."'".$p->tension_aplicada2."',"
                        ."'".$p->amperaje."',"
                        ."'".$p->voltaje_de_salida."',"
                        ."'".$p->pintura."',"
                        ."'".$p->observaciones."',"
                        ." 'Terminado',"
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
                $str_sql = "UPDATE estado_transformador SET "
                        ."tension_aplicada = '".$p->tension_aplicada."',"
                        ."ff11 = '".$p->ff11."',"
                        ."ff12 = '".$p->ff12."',"
                        ."ff13 = '".$p->ff13."',"
                        ."ff14 = '".$p->ff14."',"
                        ."ff15 = '".$p->ff15."',"
                        ."ff21 = '".$p->ff21."',"
                        ."ff22 = '".$p->ff22."',"
                        ."ff23 = '".$p->ff23."',"
                        ."ff24 = '".$p->ff24."',"
                        ."ff25 = '".$p->ff25."',"
                        ."ff31 = '".$p->ff31."',"
                        ."ff32 = '".$p->ff32."',"
                        ."ff33 = '".$p->ff33."',"
                        ."ff34 = '".$p->ff34."',"
                        ."ff35 = '".$p->ff35."',"
                        ."fn1 = '".$p->fn1."',"
                        ."fn2 = '".$p->fn2."',"
                        ."fn3 = '".$p->fn3."',"
                        ."fn4 = '".$p->fn4."',"
                        ."fn5 = '".$p->fn5."',"
                        ."corto_circuito_x = '".$p->corto_circuito_x."',"
                        ."corto_circuito_y = '".$p->corto_circuito_y."',"
                        ."corto_circuito_z = '".$p->corto_circuito_z."',"
                        ."corto_circuito_n = '".$p->corto_circuito_n."',"
                        ."seco_30_ab = '".$p->seco_30_ab."',"
                        ."seco_30_at = '".$p->seco_30_at."',"
                        ."seco_30_bt = '".$p->seco_30_bt."',"
                        ."seco_60_ab = '".$p->seco_60_ab."',"
                        ."seco_60_at = '".$p->seco_60_at."',"
                        ."seco_60_bt = '".$p->seco_60_bt."',"
                        ."aceite_30_ab = '".$p->aceite_30_ab."',"
                        ."aceite_30_at = '".$p->aceite_30_at."',"
                        ."aceite_30_bt = '".$p->aceite_30_bt."',"
                        ."aceite_60_ab = '".$p->aceite_60_ab."',"
                        ."aceite_60_at = '".$p->aceite_60_at."',"
                        ."aceite_60_bt = '".$p->aceite_60_bt."',"
                        ."encube = '".$p->encube."',"
                        ."tension_aplicada2 = '".$p->tension_aplicada2."',"
                        ."amperaje = '".$p->amperaje."',"
                        ."voltaje_de_salida = '".$p->voltaje_de_salida."',"
                        ."pintura = '".$p->pintura."',"
                        ."observaciones = '".$p->observaciones."',"
                        ."responsable = '".$p->responsable."' "
                        ."WHERE id = ".$id." ";
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
                $str_sql = "DELETE FROM estado_transformador "
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
                $str_sql = "SELECT * FROM estado_transformador "
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
}
