<?php

class RebobinadoDao {

    /*
     * metodo para guardar rebobinados
     */
    public function GuardarRebobinados(Rebobinado $rebo){
        $conn = new conexion();
        $re = -1;
        try {
            if ($conn->conectar()){
                $str_sql = "insert into rebobinado_motor(id_motor,id_usuario,v,am,balineras_ref,cap_marcha,largo,"
                        . "conexiones,cap_arranque,sello_mecanico,arr_paso,arr_espiras,arr_calibre,arr_peso_por_bobina,"
                        . "mar_paso,mar_espira,mar_calibre,mar_peso_por_bobina,num_ranura,observaciones,sugerencias)"
                        . "values("
                        ."".$rebo->getId_motor().","
                        ."".$rebo->getId_usuario().","
                        ."'".$rebo->getV()."',"
                        ."'".$rebo->getAm()."',"
                        ."'".$rebo->getBalinera_ref()."',"
                        ."'".$rebo->getCap_marcha()."',"
                        ."'".$rebo->getLargo()."',"
                        ."".$rebo->getConexiones().","
                        ."'".$rebo->getCap_arranque()."',"
                        ."'".$rebo->getSello_mecanico()."',"
                        ."'".$rebo->getArr_paso()."',"
                        ."'".$rebo->getArr_espiras()."',"
                        ."'".$rebo->getArr_calibre()."',"
                        ."'".$rebo->getArr_peso_por_bobina()."',"
                        ."'".$rebo->getMar_paso()."',"
                        ."'".$rebo->getMar_espira()."',"
                        ."'".$rebo->getMar_calibre()."',"
                        ."'".$rebo->getMar_peso_por_bobina()."',"
                        ."'".$rebo->getNum_ranura()."',"
                        ."'".$rebo->getObservaciones()."',"
                        ."'".$rebo->getSugerencia()."');";
                $sql  = $conn->getConn()->prepare($str_sql);
                $re = $sql->execute();
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        $conn->desconectar();
        return $re;
    }
    
    public function ActualizarRebobinados(Rebobinado $rebo){
        $conn = new conexion();
        $re = -1;
        try {
            if ($conn->conectar()){
                $str_sql = "Update rebobinado_motor set "
                        ."v = '".$rebo->getV()."',"
                        ."am = '".$rebo->getAm()."',"
                        ."balineras_ref ='".$rebo->getBalinera_ref()."',"
                        ."cap_marcha ='".$rebo->getCap_marcha()."',"
                        ."largo ='".$rebo->getLargo()."',"
                        ."conexiones =".$rebo->getConexiones().","
                        ."cap_arranque ='".$rebo->getCap_arranque()."',"
                        ."sello_mecanico ='".$rebo->getSello_mecanico()."',"
                        ."arr_paso ='".$rebo->getArr_paso()."',"
                        ."arr_espiras ='".$rebo->getArr_espiras()."',"
                        ."arr_calibre ='".$rebo->getArr_calibre()."',"
                        ."arr_peso_por_bobina ='".$rebo->getArr_peso_por_bobina()."',"
                        ."mar_paso ='".$rebo->getMar_paso()."',"
                        ."mar_espira ='".$rebo->getMar_espira()."',"
                        ."mar_calibre ='".$rebo->getMar_calibre()."',"
                        ."mar_peso_por_bobina ='".$rebo->getMar_peso_por_bobina()."',"
                        ."num_ranura ='".$rebo->getNum_ranura()."',"
                        ."observaciones ='".$rebo->getObservaciones()."',"
                        ."sugerencias ='".$rebo->getSugerencia()."' "
                        ."where id_motor = ".$rebo->getId_motor();
                $sql  = $conn->getConn()->prepare($str_sql);
                $re = $sql->execute();
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        $conn->desconectar();
        return $re;
    }
    
    /*
     * si el estado es terminado descativamos todas las casillas
     * del modal
     */
    public function VerEstadoRebobinado($num){
        $man = null;
        $conn = new conexion();
        try {
            if($conn->conectar()){
                $str_sql = "SELECT rebobinado_motor.v,rebobinado_motor.am,rebobinado_motor.balineras_ref,"
                        . "rebobinado_motor.cap_marcha, rebobinado_motor.largo,rebobinado_motor.cap_arranque,"
                        . "rebobinado_motor.sello_mecanico, rebobinado_motor.arr_paso,rebobinado_motor.arr_espiras,"
                        . "rebobinado_motor.arr_calibre, rebobinado_motor.arr_peso_por_bobina,rebobinado_motor.mar_paso,"
                        . "rebobinado_motor.mar_espira, rebobinado_motor.mar_calibre,rebobinado_motor.mar_peso_por_bobina,"
                        . "rebobinado_motor.num_ranura, rebobinado_motor.observaciones,rebobinado_motor.sugerencias "
                        . "FROM rebobinado_motor INNER JOIN motorl on motorl.id_motores = "
                        . "rebobinado_motor.id_motor AND motorl.estado = 'Terminado' "
                        . "AND rebobinado_motor.id_motor = ".$num;
                $sql = $conn->getConn()->prepare($str_sql);
                $sql->execute();
                $resultado = $sql->fetchAll();
                foreach ($resultado as $row){
                    $man[] = array(
                        "V"              => $row['v'],
                        "Am"             => $row['am'],
                        "Balineras"      => $row['balineras_ref'],
                        "CapMarcha"      => $row['cap_marcha'],
                        "Largo"          => $row['largo'],
                        "CapArranque"    => $row['cap_arranque'],
                        "Sello"          => $row['sello_mecanico'],
                        "Arr_paso"       => $row['arr_paso'],
                        "Arr_esp"        => $row['arr_espiras'],
                        "Arr_cal"        => $row['arr_calibre'],
                        "Arr_pe_bob"     => $row['arr_peso_por_bobina'],
                        "Mar_paso"       => $row['mar_paso'],
                        "Mar_espira"     => $row['mar_espira'],
                        "Mar_calibr"     => $row['mar_calibre'],
                        "Mar_pes_bob"    => $row['mar_peso_por_bobina'],
                        "Num_ranura"     => $row['num_ranura'],
                        "Observacio"     => $row['observaciones'],
                        "sugerencias"    => $row['sugerencias']
                    );
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        $conn->desconectar();
        return $man;
    }
    
}
